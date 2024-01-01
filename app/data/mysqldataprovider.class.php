<?php

require('chores.class.php');
require('user.class.php');

class MySqlDataProvider{

    public function get_chores(){
        return $this->query(sql:'SELECT * FROM chores',response_class:'Chores');
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

    private function connect(){
        try{
            
            return new PDO(CONFIG['db'],CONFIG['db_user'],CONFIG['db_password']);
        }catch(PDOException $e){
            
            return null;
        }
    }
}