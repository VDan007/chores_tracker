<?php


define('APP_PATH', dirname(dirname(__FILE__)));

require('config.php');
require('data/data.class.php');
require('data/mysqldataprovider.class.php');
require('data/group.class.php');
require('data/comment.class.php');
require('functions.php');


Data::initialize(new MySqlDataProvider);

$view_bag;