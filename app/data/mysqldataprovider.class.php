<?php

require('chores.class.php');
require('user.class.php');

class MySqlDataProvider{

    public function get_chores_by_admin($email,$email2){
        return $this->query(sql:"SELECT * FROM chores WHERE creator = '$email' OR creator = '$email2' ",response_class:'Chores');
    }

    public function get_chores_of_user($email){
        return $this->query(sql:"SELECT * FROM chores WHERE assigned_to = '$email' ",response_class:'Chores');
    }

    public function get_chore_by_id($id){
        return $this->query(sql: "SELECT * FROM chores WHERE id = '$id' ",response_class: 'Chores');
    }

    public function update_chore($id,$status){
        return $this->execute(
            sql:'UPDATE chores SET status = :status WHERE id = :id',
            sql_params:[
                        ':id' => $id,
                        ':status' => $status
                        ]);
    }

    public function update_chore_as_admin($id,$title,$assigned_to,$due_date,$status,$description){
        return $this->execute(
            sql:'UPDATE chores SET title = :title, assigned_to = :assigned_to, due_date = :due_date, status = :status, description = :description WHERE id = :id',
            sql_params:[
                ':id' => $id,
                ':title' => $title,
                ':assigned_to' => $assigned_to,
                ':due_date' => $due_date,
                'status' => $status,
                'description' =>$description
            ]
        );
    }

    public function delete_chore($id){
        return $this->execute(
            sql: 'DELETE FROM chores WHERE id = :id',
            sql_params:[
                ':id' => $id
            ]
        );
    }

    public function get_users(){
        try{
            return $this->query(sql:'SELECT * FROM users',response_class:'User');

        }catch(Exception $e){
            echo 'Some problem with db';
        }
    }

    public function get_user_by_email($email){
        try{
            return $this->query(sql: "SELECT * FROM users WHERE email = '$email' ",response_class:'User');

        }catch(Exception $e){
            echo 'warning problem getting user';
        }
    }

    public function create_user($name,$email,$password,$is_admin){
        try{
            return $this->execute(
                sql:'INSERT INTO users (email,password,name,is_admin) VALUES(:email,:password,:name,:is_admin)',
                sql_params:[
                    ':email' => $email,
                    ':password' => $password,
                    ':name' => $name,
                    ':is_admin' => $is_admin
                ]
            );
        }catch(Exception $e){
            return $e;
        }
    }

    public function remove_user($email){
        return $this->execute(
            sql:'DELETE  FROM users WHERE email = :email',
            sql_params:[
                ':email' => $email
            ]
        );
    }

    public function remove_user_from_group($email,$group_id,$column_to_delete){
        return $this->execute(
            sql:"UPDATE groups SET $column_to_delete = NULL",
            sql_params:[]
        );
    }

    public function add_chore($title,$creator,$assigned_to,$due_date,$status,$description){
        return $this->execute(
            sql:'INSERT INTO chores (title,creator,assigned_to,due_date,status,description) VALUES(:title,:creator,:assigned_to,:due_date,:status,:description)',
            sql_params:[
                
                ':title' => $title,
                ':creator' => $creator,
                ':assigned_to' => $assigned_to,
                ':due_date' => $due_date,
                ':status' => $status,
                ':description' => $description
            ]
        );
    }

    public function get_group_by_email($email){
        return $this->query(
            sql:"SELECT * FROM groups WHERE
                 admin_1 = '$email'  OR
                 admin_2 = '$email'  OR
                 member_1 = '$email' OR 
                 member_2 = '$email' OR 
                 member_3 = '$email' OR 
                 member_4 = '$email' OR 
                 member_5 = '$email' OR 
                 member_6 = '$email' OR 
                 member_7 = '$email' OR 
                 member_8 = '$email' OR 
                 member_9 = '$email' ",
            response_class: 'Group'     
        );
    }


    public function insert_member_into_group($group_id,$user_email,$column){

        
            return $this->execute(
                sql: "UPDATE groups SET $column = :email WHERE id = :id", 
                sql_params:[
                    ':email' => $user_email,
                    ':id' => $group_id
                ]     
            );

        


    }

    public function insert_admin_into_group($group_id,$user_email){
        return $this->execute(
            sql: 'UPDATE groups
            SET 
            admin_1 = CASE
                WHEN admin_1 IS NULL THEN :email
                ELSE admin_1
            END,    
            admin_2 = CASE
                WHEN admin_2 IS NULL THEN :email
                ELSE admin_2
            END',
            sql_params:[
                ':email' => $user_email,
                ':id' => $group_id
            ]
        );
    }

    public function create_group($admin_email){
        return $this->execute(
            sql: "INSERT INTO groups (group_name,password,admin_1)VALUES(:group_name,:password,:admin_1)",
            sql_params:[
                ':group_name' => 'Family',
                ':password' => 1234,
                ':admin_1' => $admin_email
            ]
        );
    }

    public function get_comment_by_id($comment_id){
        return $this->query(
            sql: "SELECT * FROM comments WHERE '$comment_id' = id",
            response_class:'Comment'
        );
    }



    public function add_comment($chore_id,$comment,$user_email){
        //insert new comment into comment table
        $sql = "INSERT INTO comments (comment,writer) VALUES (:comment,:user_email)";
        $sql_params =[
            ':comment' => $comment,
            ':user_email' => $user_email
        ];
        
        $db = $this->connect();
        if($db == null){
            return;
        } 

        $stmt = $db->prepare($sql);

        $stmt->execute($sql_params);
        //get the comment id
        $new_comment_id =  $db->lastInsertId();

        $stmt = null;
        $db = null;

        //update chor's comment column///
        //-get chore
        $chore = $this->get_chore_by_id($chore_id)[0];
        
        //-decode JSON comment into array
        $array = json_decode($chore->comments);
        if($array == null){
            $array = [];
        }
        
        //-push new comment id into array
        array_push($array,$new_comment_id);
        
        //-encode to string
        $encoded = json_encode($array);
        //-update chor's comment column with string
        return $this->execute(
            sql:"UPDATE chores SET comments = :encoded WHERE id = :id",
            sql_params:[
                ':encoded' => $encoded,
                ':id' =>$chore_id
            ]
        );
    }

    private function query($sql,$response_class){
        $db = $this->connect();
        if($db == null){
            
            return [];
        }

        
        $query = $db->query($sql);
        

        $data = $query->fetchAll(PDO::FETCH_CLASS,$response_class);


        $query = null;
        $db = null;

        return $data;
    }

    public function db_config(){
        $db = $this->connect();
        if($db == null){
        return;
        } 

        try{
        $stmt = $db->prepare( 
            'CREATE TABLE IF NOT EXISTS chores (
            id INT PRIMARY KEY AUTO_INCREMENT,
            title VARCHAR(50) NOT NULL,
            creator VARCHAR(50) NOT NULL,
            creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            assigned_to VARCHAR(50) NOT NULL,
            due_date DATE NOT NULL,
            status VARCHAR(50) NOT NULL,
            description VARCHAR(200) NOT NULL,
            comments TEXT);'
            );
        $stmt->execute();

        }catch(Exception $e){
            return null;
        }

        try{ 
        $stmt = $db->prepare(
            'CREATE TABLE IF NOT EXISTS comments(
            id INT PRIMARY KEY AUTO_INCREMENT,
            comment TEXT NOT NULL,
            writer VARCHAR(50) NOT NULL);'
            );
        $stmt->execute();
        }catch(Exception $e){
            return null;
        }
        
        try{ 
        $stmt = $db->prepare(
            'CREATE TABLE IF NOT EXISTS groups(
            id INT PRIMARY KEY AUTO_INCREMENT,
            group_name VARCHAR(60) NOT NULL,
            password VARCHAR(60),
            admin_1 VARCHAR(60),
            admin_2 VARCHAR(60),
            member_1 VARCHAR(60),
            member_2 VARCHAR(60),
            member_3 VARCHAR(60),
            member_4 VARCHAR(60),
            member_5 VARCHAR(60),
            member_6 VARCHAR(60),
            member_7 VARCHAR(60),
            member_8 VARCHAR(60),
            member_9 VARCHAR(60));'
        );
        $stmt->execute();
        }catch(Exception $e){
            return null;
        }

        try{ 
        $stmt = $db->prepare('CREATE TABLE IF NOT EXISTS users(
            id INT PRIMARY KEY AUTO_INCREMENT,
            email VARCHAR(60) NOT NULL,
            password VARCHAR(70) NOT NULL,
            name VARCHAR(70) NOT NULL,
            is_admin TINYINT(1) );'
        );
        $stmt->execute();
        $stmt = null;
        $db = null;
        }catch(Exception $e){
            return null;
        }
    }

    private function execute($sql,$sql_params){
       $db = $this->connect();
       if($db == null){
        return;
       } 

       $stmt = $db->prepare($sql);

       $stmt->execute($sql_params);

       $stmt = null;
       $db = null;
    }

    private function connect(){
        try{
            return new PDO(CONFIG['db'],CONFIG['db_user'],CONFIG['db_password']);
            
        }catch(PDOException $e){
            return $e;
        }
    }
}