<?php

function view($name = 'page',$model = 1){
    global $view_bag;
    require(APP_PATH . '/views/layout.view.php');
}

function sanitize($value){
    $temp = htmlspecialchars(trim($value));
    if( trim($value) == $temp){
        return $temp;
    }else{
        return '';
    }
}

function redirect($url){
    header("Location:$url");
    die();
}

function is_post(){
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}


function authenticate_user($email, $password){

    $users = Data::get_users();
    $user_to_find = false;

    foreach($users as $user){
        if ($user->email == $email && $user->password == $password ){
            $user_to_find = $user;
            break;
        }
    }

    return $user_to_find;

    


}

function is_user_authenticated(){
    return isset($_SESSION['email']);
}