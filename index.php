
<?php

session_start();
// require($_SERVER['DOCUMENT_ROOT'] . '/exam/partials/navbar.php');
// $ur = str_replace('\\','/',$_SERVER['DOCUMENT_ROOT']);
// var_dump($ur);

if ($_SERVER["REQUEST_URI"] === '/') {
    if ($_SESSION['user'] ?? []) {
        require('views/Users/user_dash.php');
    }else{
        require('controller/home.php');
    }
} elseif ($_SERVER["REQUEST_URI"] === '/register') {
    require('controller/register.php');
} elseif ($_SERVER["REQUEST_URI"] === '/login') {
    require('controller/login.php');
} elseif ($_SERVER["REQUEST_URI"] === '/dashboard') {
    require('controller/dashboardController.php');
} elseif ($_SERVER["REQUEST_URI"] === '/selectQ') {
    require('views/Users/selectQ.php');
} elseif ($_SERVER["REQUEST_URI"] === '/quiz') {
    require('views/Users/playground.php');
} elseif ($_SERVER["REQUEST_URI"] === '/success') {
    require('views/Users/success.php');
} elseif ($_SERVER["REQUEST_URI"] === '/solution') {
    require('views/Users/solution.php');
} elseif ($_SERVER["REQUEST_URI"] === '/leaderboard') {
    if ($_SESSION['user'] ?? []) {
        require('views/Users/leaderBoard.php');
    } else {
        require('controller/home.php');
    }
} elseif ($_SERVER["REQUEST_URI"] === '/history') {
    if ($_SESSION['user'] ?? []) {
        require('views/Users/history.php');
    } else {
        require('controller/home.php');
    }
    
}
