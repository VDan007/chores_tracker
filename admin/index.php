<?php
require('../app/app.php');
session_start();
ensure_user_is_authenticated();

$admin_user_email = $_SESSION['user_logged_in']->email;
$admins_group = Data::get_group_by_email($admin_user_email);
$admins_group_id = $admins_group[0]->id;
$array_of_group_members = [];
$array_of_group_admins = [];


foreach(  (array) $admins_group[0]  as $key => $value){
    if($key != 'id' && $key != 'group_name' && $key != 'password' && $key !='admin_1' && $key != 'admin_2'){
        if(isset($value)){
            array_push($array_of_group_members,$value);
        }else{
            array_push($array_of_group_members, "--");
        }
    }
}
foreach(  (array) $admins_group[0]  as $key => $value){
    if( $key =='admin_1' || $key == 'admin_2'){
        if(isset($value)){
            array_push($array_of_group_admins,$value);
        }else{
            array_push($array_of_group_admins, "--");
        }
    }
}
$array = (array) $admins_group[0];
$empty_place=  find_empty_space_for_new_member( $array);





if(is_post()){

    


    if(isset($_POST['add_member'])){
        
        $name = sanitize( $_POST['new_user_name'] );
        $email = sanitize ($_POST['new_user_email']);
        $password = sanitize($_POST['new_user_password']);
    
        if($name != null && $email != null && $password != null){
            try{
                Data::create_user($name,$email,$password,0);
                Data::insert_member_into_group($admins_group_id,false,$email,$empty_place);
                redirect('index.php');
    
            }catch(Exception $e){
                echo 'problem with creating new user';
            }
        }

    }

    elseif(isset($_POST['remove_member'])){
        
        $email = sanitize ($_POST['user_email_to_remove']);

        if($email != null){

            $column_to_delete = null;

            foreach($admins_group[0] as $key => $value){
                if($value == $email){
                    $column_to_delete = $key;
                    break;
                }
            }
            

            
            try{
                Data::remove_user($email,$admins_group_id,$column_to_delete);
                redirect('index.php');

            }catch(Exception $e){
                echo 'problem removing member';
            }
        }
    }
}




view('admin/dashboard',Data::get_chores_by_admin($admin_user_email), $array_of_group_members, $array_of_group_admins);