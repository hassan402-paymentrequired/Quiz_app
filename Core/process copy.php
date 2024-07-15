<?php 


namespace Core;
session_start();
require('./function.php');
require('../config/database.php');

if(isset($_POST['publishss']) ){
//     $title = htmlspecialchars(trim($_POST['title']));
//     $option_1 = htmlspecialchars(trim($_POST['option_1']));
//     $option_2 = htmlspecialchars(trim($_POST['option_2']));
//     $option_3 = htmlspecialchars(trim($_POST['option_3']));
//     $option_4 = htmlspecialchars(trim($_POST['option_4']));
//     $correct_answer = htmlspecialchars(trim($_POST['correct']));

//     $questions =[];

// $question =  [
//     'title' => $title, 
//     'option_1' => $option_1,
//     'option_2' => $option_2,
//     'option_3' => $option_3,
//     'option_4' => $option_4
// ];

// array_push($questions, $question);


// // for ($i=0; $i < ; $i++) { 
// //     # co
// // }

// try {
//     var_dump($questions);
//     exit();
// } catch (\Throwable $e) {
//     var_dump($e->getMessage());
// }


foreach ($_POST as $key => $value) {
    if (strpos($key, 'title') !== false) { // Identify question titles
      $questionIndex = (int) str_replace('title', '', $key); // Extract question index

      // Create an array for each question based on extracted data
      $questions[$questionIndex] = [
        'title' => htmlspecialchars(trim($value)),
        'option_1' => htmlspecialchars(trim($_POST['option_' . $questionIndex])),
        'option_2' => htmlspecialchars(trim($_POST['option_' . $questionIndex])),
        'option_3' => htmlspecialchars(trim($_POST['option_' . $questionIndex])),
        'option_4' => htmlspecialchars(trim($_POST['option_' . $questionIndex])),
        'correct_answer' => htmlspecialchars(trim($_POST['correct_' . $questionIndex])),
      ];
    }
    var_dump($questions);
    die();  
  }

  // Now you have the $questions array containing all submitted questions
  // Process and store them in your database here


  

  
  // Example:
  if (!empty($questions)) { // Check if there are any questions
    foreach ($questions as $question) {
      // Insert question data into your database using prepared statements to prevent SQL injection
      // ... your database interaction code here with prepared statements
      var_dump($question);
    }

   

    echo "Questions submitted successfully!"; // Or any success message
  } else {
    echo "No questions submitted."; // Handle no questions scenario
    var_dump($questions);
  }
} else {
  echo "Invalid request method";
}







