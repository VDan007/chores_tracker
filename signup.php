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

    try{
        Data::create_user($name,$email,$password,1);
        Data::create_group($email);
        $view_bag = 'User created successfully! </br> You will be redirected to login shortly!';
        echo '<script>setTimeout(function() { window.location.href = "login.php"; }, 3500);</script>';

    }catch(Exception $e){
        echo 'Some proble registering user';
    }


   
   }

   


}





view('signup');


?>
<!-- <script>
    alert('ji');
</script> -->
