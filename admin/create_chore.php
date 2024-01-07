<?php 
require('../app/app.php');
session_start();
ensure_user_is_authenticated();


////////////////////// user options///////////////////////
$all_users = Data::get_users();
$group = Data::get_group_by_email($_SESSION['user_logged_in']->email)[0];
$users = filter_users_by_group($all_users,$group);
$array_of_user_options = array_map( fn($user)=> $user->email, $users);
////////////////////// user options///////////////////////

if(is_post()){
    $title = sanitize($_POST['title']);
    $creator = $_SESSION['user_logged_in']->email;
    $assigned_to = sanitize($_POST['assigned_to']);
    $due_date = $_POST['due_date'];
    $status = 'not started';
    $description = sanitize($_POST['description']);
    
    try{
        Data::add_chore($title,$creator,$assigned_to,$due_date,$status,$description);

    }catch(Exception $e){
        echo $e;
    }
    
    redirect('index.php');
}


view('admin/create_chore',$array_of_user_options);