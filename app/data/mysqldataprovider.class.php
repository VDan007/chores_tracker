<?php

class MySqlDataProvider{

    public function get_terms(){
        return $this->query('SELECT * FROM chores');
    }

    private function query($sql,$sql_param = []){
        $db = $this->connect();
        if($db == null){
            return [];
        }

        $query = null;

        if(empty($sql_params)){
            $query = $db->query($sql);
        }

        $data = $query->fetchAll(PDO::FETCH_CLASS,'Chores');

        $query = null;
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