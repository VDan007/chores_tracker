<?php

require('chores.class.php');
require('user.class.php');

class MySqlDataProvider{

    public function get_chores(){
        return $this->query(sql:'SELECT * FROM chores',response_class:'Chores');
    }

    public function get_chores_of_user($email){
        return $this->query(sql:"SELECT * FROM chores WHERE assigned_to = '$email' ",response_class:'Chores');
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
        return $this->query(sql:'SELECT * FROM users',response_class:'User');
    }

    public function get_user_by_email($email){
        return $this->query(sql: "SELECT * FROM users WHERE email = '$email' ",response_class:'User');
    }

    public function create_user($name,$email,$password,$is_admin){
        return $this->execute(
            sql:'INSERT INTO users (email,password,name,is_admin) VALUES(:email,:password,:name,:is_admin)',
            sql_params:[
                ':email' => $email,
                ':password' => $password,
                ':name' => $name,
                ':is_admin' => $is_admin
            ]
        );
    }

    public function remove_user($email){
        return $this->execute(
            sql:'DELETE  FROM users WHERE email = :email',
            sql_params:[
                ':email' => $email
            ]
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


    public function insert_member_into_group($group_id,$user_email){
        return $this->execute(
            sql: 'UPDATE groups
            SET 
            member_1 = CASE
                WHEN member_1 IS NULL THEN :email
                ELSE member_1
            END,    
            member_2 = CASE
                WHEN member_2 IS NULL THEN :email
                ELSE member_2
            END,    
            member_3 = CASE
                WHEN member_3 IS NULL THEN :email
                ELSE member_3
            END,    
            member_4 = CASE
                WHEN member_4 IS NULL THEN :email
                ELSE member_4
            END,    
            member_5 = CASE
                WHEN member_5 IS NULL THEN :email
                ELSE member_5
            END,    
            member_6 = CASE
                WHEN member_6 IS NULL THEN :email
                ELSE member_6
            END,    
            member_7 = CASE
                WHEN member_7 IS NULL THEN :email
                ELSE member_7
            END,    
            member_8 = CASE
                WHEN member_8 IS NULL THEN :email
                ELSE member_8
            END,    
            member_9 = CASE
                WHEN member_9 IS NULL THEN :email
                ELSE member_9
            END
            WHERE id = :id',
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
            return null;
        }
    }
}