<?php 
require('../app/app.php');
session_start();
ensure_user_is_authenticated();

view('admin/create_chore');


if(is_post()){
    $title = sanitize($_POST['title']);
    $creator = 'admin@admin.com';
    $assigned_to = sanitize($_POST['assigned_to']);
    $due_date = $_POST['due_date'];
    $status = 'not started';
    $description = sanitize($_POST['description']);

    Data::add_chore($title,$creator,$assigned_to,$due_date,$status,$description);

    redirect('index.php');
}