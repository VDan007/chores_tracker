<?php
require('app/app.php');
session_start();





if(is_user_authenticated()){
    redirect('dashboard.php');
}else{
    view('start');

}


