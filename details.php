<?php

require('app/app.php');
session_start();

ensure_user_is_authenticated();

if(is_get() && isset($_GET['id'])){
    $id = sanitize($_GET['id']);

    $chores = Data::get_chores_of_user($_SESSION['user_logged_in']->email);

    $chore_i_need = find_chore_by_id($chores,$id);

    $comment_ids = json_decode($chore_i_need->comments);
    if($comment_ids !== null){
        $array_of_comment_objects = array_map(fn($id)=> Data::get_comment_by_id($id)[0],$comment_ids);
        }else{
    $array_of_comment_objects = [];
    }

    view('details',$chore_i_need,$array_of_comment_objects);
    
}elseif(is_post() ){
   $status = sanitize($_POST['status']);
   $id = sanitize($_POST['id']);

   Data::update_chore($id,$status);
   if(!isset($_POST['add_comment'])){
       redirect('dashboard.php');
   }else{
    $comment = sanitize($_POST['new_comment']);
    Data::add_comment($id,$comment,$_SESSION['user_logged_in']->email);
    redirect("details.php?id=$id");
   }

}else{
    redirect('dashboard.php');
}


