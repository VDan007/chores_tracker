<?php

require('chores.class.php');

class MySqlDataProvider{

    public function get_chores(){
        return $this->query(sql:'SELECT * FROM chores');
    }

    private function query($sql){
        $db = $this->connect();
        if($db == null){
            
            return [];
        }

        
        $query = $db->query($sql);
        

        $data = $query->fetchAll(PDO::FETCH_CLASS,'Chores');


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