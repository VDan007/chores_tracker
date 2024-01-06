<?php

require('app/app.php');

if(is_post()){
    $name = sanitize($_POST['name']);
    $email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
    $password = sanitize($_POST['password']);
    $password_again = sanitize($_POST['password_again']);


   if(Data::get_user_by_email($email) != null){
    $view_bag = 'E-mail already in use';
   }
   
   elseif($password !== $password_again){
    $view_bag = 'Passwords are not matching';
   }

   elseif($name == '' || $email =='' || $password ==''){
    $view_bag = 'Please fill in all fields';
   }
   
   
   else{
    Data::create_user($name,$email,$password);
   }


}



view('signup');