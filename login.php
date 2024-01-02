<?php
require('app/app.php');
session_start();

if(is_post()){
    $email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
    $password = sanitize($_POST['password']);

    if(authenticate_user($email,$password)){
        $_SESSION['user_logged_in'] = authenticate_user($email,$password);
        if(is_user_admin()){
            redirect('admin/');
        }else{
            redirect('dashboard.php');
        }
    }else{
        $view_bag['status'] = 'The provided credentials are not correct';
    }

    if($email == false){
        $view_bag['status'] =  'Please enter a valid email adress';
    }
    
}


view('login');