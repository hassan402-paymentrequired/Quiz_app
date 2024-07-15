<?php

require('../config/database.php');
session_start();

if (isset($_POST['take'])) {

    $json = $_POST['all'];
    $id = $_POST['id'];
    $sub_id = $_POST['sub_id'];



    $getQ = json_decode($json, true);



    $right = 0;
    foreach ($getQ as $question) {

        $db = new Database();



        $getQresult = $db->query("SELECT * FROM questions WHERE id = ?", [$question['id']])->fetch();

        $ans = $question['answer'] ?? '';

        if ($ans === $getQresult['correct_answer']) {
            $right = $right + 1;
        }
    }


    $percent = ceil($right / count($getQ) * 100);

    echo $percent . '%';

    $add_history = $db->query("INSERT INTO history (user_id,percent, subject_id) VALUES(?,?,?)", [$id, $percent, $sub_id]);


    $check_previous_score = $db->query("SELECT percent FROM history WHERE user_id = ?", [$id])->fetch();

    if ($check_previous_score > $percent) {
        $_SESSION['message'] = [
            'previous' => $check_previous_score,
            'now' => $percent,
            'msg' => 'try harder next time'
        ];
    } else {
        $_SESSION['message'] = [
            'previous' => $check_previous_score,
            'now' => $percent,
            'msg' => 'congratulations on your new score 🎉'
        ];
    }



    $_SESSION['corrections'] = $getQ;

    header('Location: /success');

    die();


    // echo '<pre>';
    // var_dump($getQ);
    // echo '</pre>';
}
