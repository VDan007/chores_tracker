<?php

require('../app/app.php');
session_start();
ensure_user_is_authenticated();

view('admin/edit_chore');