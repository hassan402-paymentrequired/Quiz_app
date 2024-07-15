<?php 


namespace Core;

use Database;

session_start();
require('./function.php');
require('../config/database.php');

if(isset($_POST['publish']) ){
    $title = htmlspecialchars(trim($_POST['title']));
    $option_1 = htmlspecialchars(trim($_POST['option_1']));
    $option_2 = htmlspecialchars(trim($_POST['option_2']));
    $option_3 = htmlspecialchars(trim($_POST['option_3']));
    $option_4 = htmlspecialchars(trim($_POST['option_4']));
    $correct_answer = htmlspecialchars(trim($_POST['correct']));
    $difficulty = htmlspecialchars(trim($_POST['level']));
    $subject = htmlspecialchars(trim($_POST['subject']));



    try {
      



        $db = new Database();


        $checkSubjectId = $db->query("SELECT * FROM subjects WHERE name =?", [$subject])->fetch();

        $subject_id = $checkSubjectId['id'];




        $insert = $db->query("INSERT INTO questions (title,option_1,option_2,option_3,option_4,correct_answer,subject_id,difficulty) VALUES(?,?,?,?,?,?,?,?)", [
        $title,
        $option_1,
        $option_2,
        $option_3,
        $option_4,
        $correct_answer,
        $subject_id,
        $difficulty
        ]);

        header('Location: /views/Admin/dashboard.php');



    } catch (\Throwable $e) {
        var_dump($e);
    }

}






