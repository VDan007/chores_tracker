<?php

require('app/app.php');
session_start();

ensure_user_is_authenticated();




view('dashboard',Data::get_chores_of_user($_SESSION['user_logged_in']->email));


