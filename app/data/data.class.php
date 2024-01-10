<?php

//require('dataprovider.class.php');

class Data{

    static private $ds;
    static public function initialize( $data_provider){
        return self::$ds = $data_provider;
    }

    static public function get_chores_by_admin($email,$email2){
        return self::$ds->get_chores_by_admin($email,$email2);
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

    static public function create_user($name,$email,$password,$is_admin){
        try{
            return self::$ds->create_user($name,$email,$password,$is_admin);
        }
        catch(Exception $e){
            echo $e;
        }
    }

    static public function insert_member_into_group($group_id,$user_email,$column){
            return self::$ds->insert_member_into_group($group_id,$user_email,$column); 
    }

    static public function remove_user($email,$group_id,$column_to_delete){
        self::$ds->remove_user_from_group($email,$group_id,$column_to_delete);
        return self::$ds->remove_user($email);
    }



    static public function get_user_by_email($email){
        return self::$ds->get_user_by_email($email);
    }
    static public function get_group_by_email($email){
        return self::$ds->get_group_by_email($email);
    }
    static public function create_group($admin_email){
        return self::$ds->create_group($admin_email);
    }
    static public function add_comment($chore_id,$comment,$user_email){
        return self::$ds->add_comment($chore_id,$comment,$user_email);
    }
    static public function get_comment_by_id($comment_id){
        return self::$ds->get_comment_by_id($comment_id);
    }
    static public function db_config(){
        return self::$ds->db_config();
    }
}