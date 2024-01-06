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





view('admin/dashboard',Data::get_chores(), $array_of_group_members);