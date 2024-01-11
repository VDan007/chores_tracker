
<?php 
require('app/app.php');


if(is_post()){

  

    if(isset($_POST['launch'])){
        try{
            Data::db_config();
            $view_bag['db_setup_result'] = 'DB SETUP IS A SUCCESS! :)';

            
            

        }catch(Exception $e){
            return null;
            $view_bag['db_setup_result']  = 'Error while setting up db :(';
        }

        
    }
}


//////////chores table

// CREATE TABLE IF NOT EXISTS chores (

//     id INT PRIMARY KEY AUTO_INCREMENT,
//     title VARCHAR(50) NOT NULL,
//     creator VARCHAR(50) NOT NULL,
//     creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//     assigned_to VARCHAR(50) NOT NULL,
//     due_date DATE NOT NULL,
//     status VARCHAR(50) NOT NULL,
//     description VARCHAR(200) NOT NULL,
//     comment TEXT


// );

///////comments table
// CREATE TABLE IF NOT EXISTS comments(

//     id INT PRIMARY KEY AUTO_INCREMENT,
//     comment TEXT NOT NULL,
//     writer VARCHAR(50) NOT NULL

// );


///////groups table
// CREATE TABLE IF NOT EXISTS groups(

// 	id INT PRIMARY KEY AUTO_INCREMENT,
//     group_name VARCHAR(60) NOT NULL,
//     password VARCHAR(60),
//     admin_1 VARCHAR(60),
//     admin_2 VARCHAR(60),
//     member_1 VARCHAR(60),
//     member_2 VARCHAR(60),
//     member_3 VARCHAR(60),
//     member_4 VARCHAR(60),
//     member_5 VARCHAR(60),
//     member_6 VARCHAR(60),
//     member_7 VARCHAR(60),
//     member_8 VARCHAR(60),
//     member_9 VARCHAR(60)
// );

//////users table
// CREATE TABLE IF NOT EXISTS users(

// 	id INT PRIMARY KEY AUTO_INCREMENT,
//     email VARCHAR(60) NOT NULL,
//     password VARCHAR(70) NOT NULL,
//     name VARCHAR(70) NOT NULL,
//     is_admin TINYINT(1) 
// );


view('setup');





