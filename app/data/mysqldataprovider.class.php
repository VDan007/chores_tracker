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

    public function get_users(){
        return $this->query(sql:'SELECT * FROM users',response_class:'User');
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