<?php

require('app/app.php');
session_start();

ensure_user_is_authenticated();

if(is_get() && isset($_GET['action']) && $_GET['action'] == 'quick_done'){
    $id = $_GET['id'];
    $status = $_GET['status'];
    quick_done($id,$status);
}


view('dashboard',Data::get_chores_of_user($_SESSION['user_logged_in']->email));


