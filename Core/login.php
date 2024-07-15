<?php

namespace Core;

use Redirect;

require("./AuthenticatUser.php");
include("../utils/redirect.php");


if (isset($_POST['login'])) {
    $email = trim(htmlspecialchars($_POST['email']));
    $password = trim(htmlspecialchars($_POST['password']));


  
    $userLogin = new AuthenticateUser();

    $validateUser = $userLogin->login($email, $password);

    if (!$validateUser) {
        $_SESSION['error'] = "No user with credentials provided";
        return new Redirect("/login");
    }


    $_SESSION['user'] = $validateUser;

    if ($validateUser['role'] ===  "admin") {
        return new Redirect("/views/Admin/dashboard.php");
    }

    return new Redirect('/');


}
