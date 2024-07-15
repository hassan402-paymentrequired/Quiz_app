<?php

namespace Core;

use Redirect;

include("../utils/redirect.php");
require("./AuthenticatUser.php");


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
        return new Redirect(' /register');
    }

    $authenticate = new AuthenticateUser();

    $verifyUser = $authenticate->Register($email, $password, $first_name, $last_name, $phone, $role);

    // return if email already exist
    if (!$verifyUser) {
        $error =  'email already taken';
        $_SESSION['email'] = $error;
        return new Redirect('/register');
    }

    // set the user to the session and redirect
    $_SESSION['user'] = $verifyUser;
    if ($verifyUser['role'] ===  "admin") {
        return new Redirect("/views/Admin/dashboard.php");
    }

    return new Redirect('/');
}

require('../views/register.php');
