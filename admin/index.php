<?php
require('../app/app.php');
session_start();
ensure_user_is_authenticated();

$admin_user_email = $_SESSION['user_logged_in']->email;
$admins_group = Data::get_group_by_email($admin_user_email);

$array_of_group_members = [];

foreach(  (array) $admins_group[0]  as $key => $value){
    if($key != 'id' && $key != 'group_name' && $key != 'password'){
        if(isset($value)){
            array_push($array_of_group_members,$value);
        }else{
            array_push($array_of_group_members, "--");
        }
    }
}

if(is_post()){

    


    if(isset($_POST['add_member'])){
        
        $name = sanitize( $_POST['new_user_name'] );
        $email = sanitize ($_POST['new_user_email']);
        $password = sanitize($_POST['new_user_password']);
    
        if($name != null && $email != null && $password != null){
            try{
                Data::create_user($name,$email,$password,0);
                redirect('index.php');
    
            }catch(Exception $e){
                echo 'problem with creating new user';
            }
        }

    }

    elseif(isset($_POST['remove_member'])){
        
        $email = sanitize ($_POST['user_email_to_remove']);

        if($email != null){
            
            try{
                Data::remove_user($email);
                

            }catch(Exception $e){
                echo 'problem removing member';
            }
        }
    }
}




view('admin/dashboard',Data::get_chores(), $array_of_group_members);