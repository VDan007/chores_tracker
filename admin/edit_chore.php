<?php

require('../app/app.php');
session_start();
ensure_user_is_authenticated();


if(is_get() && isset($_GET['id'])){

    $id = sanitize($_GET['id']);
    $chores = Data::get_chores_by_admin($_SESSION['user_logged_in']->email,$_SESSION['other_admins_email']);
    

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

    }elseif(isset($_POST['add_comment'])){
        $id = sanitize($_POST['id']);
        $comment = sanitize($_POST['new_comment']);
        Data::add_comment($id,$comment,$_SESSION['user_logged_in']->email);
        redirect("edit_chore.php?id=$id");
    }
}else{
    redirect('index.php');
}


////////////////////////// status options //////////////////////
$chore_to_edit = find_chore_by_id($chores,$id);

$status = $chore_to_edit->status;

$array_of_options = ['not started','in progress','delay','done'];
    
$array_of_options_without_current_status = array_filter($array_of_options, fn($value) => $value != $status );

$status_array_to_display = array_merge([$chore_to_edit->status],$array_of_options_without_current_status);
////////////////////////////// status options //////////////////////////////////////////////////

///////////////////////////////comments//////////////////////////////////

//get array of comments so I can echo them
$comment_ids = json_decode($chore_to_edit->comments);
if($comment_ids !== null){
    $array_of_comment_objects = array_map(fn($id)=> Data::get_comment_by_id($id)[0],$comment_ids);

}else{
    $array_of_comment_objects = [];
}


///////////////////////////////comments//////////////////////////////////

/////////////////////////////// user options ///////////////////////////////////
$group = Data::get_group_by_email($_SESSION['user_logged_in']->email)[0];

$all_users = Data::get_users();

$users = filter_users_by_group($all_users,$group);

$array_of_user_options = array_map( fn($user)=> $user->email, $users);

$current_owner_of_chore = $chore_to_edit->assigned_to;

$index_of_current_user_email = array_search($current_owner_of_chore,$array_of_user_options);;

unset($array_of_user_options[$index_of_current_user_email]);

array_unshift($array_of_user_options,$current_owner_of_chore);

/////////////////////////////// user options ///////////////////////////////////


view('admin/edit_chore',$chore_to_edit, $status_array_to_display, $array_of_user_options, $array_of_comment_objects);