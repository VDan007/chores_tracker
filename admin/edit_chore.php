<?php

require('../app/app.php');
session_start();
ensure_user_is_authenticated();


if(is_get() && isset($_GET['id'])){

    $id = sanitize($_GET['id']);
    $chores = Data::get_chores();

}elseif(is_post()){
    
    if(isset($_POST['save'])){
        $id = sanitize($_POST['id']);
        $title = sanitize($_POST['title']);
        $assigned_to = sanitize($_POST['assigned_to']);
        $due_date = $_POST['due_date'];
        $status = sanitize($_POST['status']);
        $description = sanitize($_POST['description']);

        Data::update_chore_as_admin($id,$title,$assigned_to,$due_date,$status,$description);

        redirect('index.php');

    }elseif(isset($_POST['delete'])){
        $id = sanitize($_POST['id']);

        Data::delete_chore($id);

        redirect('index.php');
    }
}else{
    redirect('index.php');
}



$chore_to_edit = find_chore_by_id($chores,$id);

$status = $chore_to_edit->status;

$array_of_options = ['not started','in progress','delay','done'];
    
$array_of_options_without_current_status = array_filter($array_of_options, fn($value) => $value != $status );

$array_to_display = array_merge([$chore_to_edit->status],$array_of_options_without_current_status);






view('admin/edit_chore',$chore_to_edit, $array_to_display);