<?php

namespace Core;

session_start();

use Database;

require('./function.php');
require('../config/database.php');

if (isset($_POST['create'])) {
    $first_name = trim(htmlspecialchars($_POST['first_name']));
    $last_name = trim(htmlspecialchars($_POST['first_name']));
    $email = trim(htmlspecialchars($_POST['email']));
    $phone = trim(htmlspecialchars($_POST['phone']));
    $role = trim(htmlspecialchars($_POST['role']));
    $password = trim(htmlspecialchars($_POST['password']));



    $errors = validateAllInput($email, $first_name, $last_name, $phone, $password);


    if (!empty($errors)) {

        $_SESSION['all_errors'] = $errors;
        header('Location: /register');
        exit();
    } else {


        try {

            $db = new Database();

            $user = $db->query("SELECT * FROM users WHERE email = ?", [$email])->fetch();

            if (!$user) {

                $hashPwd = password_hash($password, PASSWORD_BCRYPT);

                $newUser = $db->query("INSERT INTO users (first_name, last_name, email, role, phone, password) VALUE(?,?,?,?,?,?)", [$first_name, $last_name, $email, $role, $phone, $hashPwd]);

                $userOne = $db->query("SELECT * FROM users WHERE email = ?", [$email])->fetch();
                // var_dump($userOne);
                // die();

                // insert the new user into the session
                $_SESSION['user'] = $userOne;

                if ($userOne['role'] ===  "admin") {
                    header('Location: /views/Admin/dashboard.php');
                    exit();
                } else {
                    header('Location: /');
                    exit();
                }
            } else {
                $error =  'email already taken';
                $_SESSION['email'] = $error;
                header('Location: /register');
            }
        } catch (\Throwable $e) {
            var_dump($e->getMessage());
        }
    }
}

// require ('../controller/register.php');
require('../views/register.php');
