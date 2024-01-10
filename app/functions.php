<?php

function view($name = 'page',$model = 1,$model2 = 1, $model3 = 1,$model4=1,$model5=1,$model6=1){
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

function is_get(){
    return $_SERVER['REQUEST_METHOD'] === 'GET';
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
    return isset($_SESSION['user_logged_in']);
}

function is_user_admin(){
    return $_SESSION['user_logged_in']-> is_admin > 0;
}

function ensure_user_is_authenticated(){
    if(!is_user_authenticated()){
        redirect('/school_project_chore_tracker/login.php');
    }
}

function find_chore_by_id($array,$id){
    foreach($array as $item){
        if($item->id == $id){
            return $item;
        }
    }
}

function quick_done($id,$status){
    $status = sanitize($status);
    $id = sanitize($id);
    Data::update_chore($id,$status);
}

function find_empty_space_for_new_member($array,$is_admin){

    if($is_admin){
        foreach($array as $key=>$value){
            if(
               ($key == 'admin_1' && $value == null ) ||
               ($key == 'admin_2' &&  $value == null) ){
                return $key;
                break;
            }
        }

    }else{
        foreach($array as $key=>$value){
            if($key != 'id' && 
               $key != 'group_name' &&
               $key != 'password' && 
               $key != 'admin_1' && 
               $key != 'admin_2' &&  
               $value == null){
                return $key;
                break;
            }
        }

    }

}

function filter_users_by_group($users_array,$group_class){
    $users_filtered = [];
   
    foreach($users_array as $user){
        foreach( (array) $group_class as $key => $value){
            if($user->email == $value){
                array_push($users_filtered,$user);
            }
        }
    }
    return $users_filtered;
}

function empty_space_detector($array,$to_find){
    foreach($array as $item){
        if($item == $to_find){
            return true;
        }
    }
    return false;
}   




function debug($text,$value_to_echo){
    echo $text . ' ' . var_dump($value_to_echo);
}