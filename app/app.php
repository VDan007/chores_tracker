<?php


define('APP_PATH', dirname(dirname(__FILE__)));

require('config.php');
require('functions.php');
require('data/data.class.php');
require('data/mysqldataprovider.class.php');


Data::initialize(new MySqlDataProvider);