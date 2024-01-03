<?php

require('app/app.php');
session_start();

ensure_user_is_authenticated();

if(is_get() && isset($_GET['id'])){
    $id = sanitize($_GET['id']);

    $chores = Data::get_chores_of_user($_SESSION['user_logged_in']->email);

    $chore_i_need = find_chore_by_id($chores,$id);

    view('details',$chore_i_need);
    
}else{
    redirect('dashboard.php');
}