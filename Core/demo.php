<?php


namespace Core;

use Database;

session_start();
require('./function.php');
require('../config/database.php');



if (isset($_POST['send'])) {


    $all_form = [];
    $total = $_POST['num'];

    for ($i = 1; $i <= $total; $i++) {
        $title = htmlspecialchars(trim($_POST["title-$i"]));
        $option_1 = htmlspecialchars(trim($_POST["option_1_$i"]));
        $option_2 = htmlspecialchars(trim($_POST["option_2_$i"]));
        $option_3 = htmlspecialchars(trim($_POST["option_3_$i"]));
        $option_4 = htmlspecialchars(trim($_POST["option_4_$i"]));
        $correct_answer = htmlspecialchars(trim($_POST["correct_$i"]));
        $difficulty = htmlspecialchars(trim($_POST["level"]));
        $subject = htmlspecialchars(trim($_POST["subject"]));

        $all_form[] = [
            'title' => $title,
            'option_1' => $option_1,
            'option_2' => $option_2,
            'option_3' => $option_3,
            'option_4' => $option_4,
            'answer' => $correct_answer,
            'difficulty' => $difficulty,
            'subject' => $subject
        ];



         try {

            $db = new Database();

            $checkSubjectId = $db->query("SELECT * FROM subjects WHERE name =?", [$subject])->fetch();

            $subject_id = $checkSubjectId['id'];

            $sql = "INSERT INTO questions (title,option_1 ,option_2, option_3, option_4,correct_answer,difficulty,subject_id) VALUES(?,?,?,?,?,?,?,?)";

            $post_to_db = $db->query($sql, [
                $title,
                $option_1,
                $option_2,
                $option_3,
                $option_4,
                $correct_answer,
                $difficulty,
                $subject_id
            ]);

            header('Location: /views/Admin/dashboard.php');

         
        } catch (\Throwable $e) {
            var_dump($e);
         }
    }


}
