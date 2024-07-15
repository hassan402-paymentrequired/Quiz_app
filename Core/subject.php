<?php
require('../config/database.php');
require('./function.php');

if(isset($_POST['add'])){

    $subject = trim(htmlspecialchars($_POST['subject']));

    if($subject ===''){
        $_SESSION['subject'] = 'invalid subject';
        header('Location: /views/Admin/dashboard.php?subject');
        exit();
    }

    try {
        
        $db = new Database();


    
        $exist =  $db->query("SELECT * FROM subjects WHERE name = ?", [$subject])->fetch();

    

        if(!$exist){
            $add_subject = $db->query("INSERT INTO subjects (name) VALUES(?)", [$subject]);
            $_SESSION['subject'] = ' subject added';
            header('Location: /views/Admin/dashboard.php?subject');
            exit();
        }
        else{
            $_SESSION['subject'] = ' subject already exist';
            header('Location: /views/Admin/dashboard.php?subject');
            exit();
        }






    } catch (\Throwable $e) {
        var_dump($e);
    }

}