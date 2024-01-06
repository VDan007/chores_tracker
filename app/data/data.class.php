<?php

//require('dataprovider.class.php');

class Data{

    static private $ds;
    static public function initialize( $data_provider){
        return self::$ds = $data_provider;
    }

    static public function get_chores(){
        return self::$ds->get_chores();
    } 

    static public function get_chores_of_user($email){
        return self::$ds->get_chores_of_user($email);
    }

    static public function get_term($term){
        return self::$ds->get_term($term);
    }
    static public function search_terms($search){
        return self::$ds->search_terms($search);
    }
    static public function add_chore($title,$creator,$assigned_to,$due_date,$status,$description){
        return self::$ds->add_chore($title,$creator,$assigned_to,$due_date,$status,$description);
    }
    static public function update_chore($id,$status){
        return self::$ds->update_chore($id,$status);
    }

    static public function update_chore_as_admin($id,$title,$assigned_to,$due_date,$status,$description){
       return self::$ds-> update_chore_as_admin($id,$title,$assigned_to,$due_date,$status,$description);
    }

    static public function delete_chore($chore){
        return self::$ds->delete_chore($chore);
    }
    static public function get_users(){
        return self::$ds->get_users();
    }

    static public function create_user($name,$email,$password){
        try{
            return self::$ds->create_user($name,$email,$password);
        }
        catch(Exception $e){
            echo $e;
        }
    }

    static public function get_user_by_email($email){
        return self::$ds->get_user_by_email($email);
    }
    static public function get_group_by_email($email){
        return self::$ds->get_group_by_email($email);
    }
}