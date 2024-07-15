<?php 

require "../config/database.php";
session_start();

if(isset($_GET['get'])){

    $subject = trim(htmlspecialchars($_GET['subject']));
    $level = trim(htmlspecialchars($_GET['level']));
    $num =  intval(trim(htmlspecialchars($_GET['num'])));
    
  


    try {

        $db = new Database();


        
        $getSubject = $db->query("SELECT * FROM subjects WHERE name = ?", [$subject])->fetch();

        

        $subject_id = intval($getSubject['id']);

      

        $getAllQ = $db->query(" SELECT * FROM questions q WHERE q.subject_id = ? AND q.difficulty = ? LIMIT $num", [
            $subject_id, $level
        ])->fetchAll();



        $_SESSION['question'] = $getAllQ;
         header('Location: /quiz');

    } catch (\Throwable $e) {
        var_dump($e->getMessage());
    }


}


require('../views/Users/playground.php');

