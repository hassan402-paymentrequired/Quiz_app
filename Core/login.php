<?php
namespace Core;

use Database;

// use Core\Validate;

require('../config/database.php');


// session_start();
// use Database;
require('./function.php');
// require('../config/database.php');

session_start();


if(isset($_POST['login'])){
    $email = trim(htmlspecialchars($_POST['email']));
    $password = trim(htmlspecialchars($_POST['password']));


    $validateEmail = new Validate();

    $valid_email = $validateEmail::validateEmail($email);



    if(!$valid_email){
        $_SESSION['email_error'] = 'invalid email';
        header('Location: /login ');
        exit();
    }

    if(strlen($password) < 5){
        $_SESSION['password_error'] = 'invalid password';
        header('Location: /login ');
        exit();
    }

 

  try {

    $db = new Database();
  
    $user = $db->query("SELECT * FROM users WHERE email = ?", [$email])->fetch();

    if(!$user){
        $_SESSION['password_error'] = 'No user with that credentials found please sign up';
        header('Location: /login ');
        exit();
     
    }
    else{
 

        if(password_verify($password, $user['password'])){

    

            $_SESSION['user'] = $user;

        

            if($user['role'] ===  "admin"){
                header('Location: /views/Admin/dashboard.php');
            }else{
                header('Location: /');
            }



            
            exit();
        }
        else{
            $_SESSION['password_error'] = 'No user with that credentials found please sign up';
            header('Location: /login ');
            exit();
        }

        

    }



  } catch (\Throwable $th) {
    //throw $th;
  }

}