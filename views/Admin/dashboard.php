<?php

session_start();

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Quiz</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="outline-none ">

  <!-- side bar -->
  <div class="flex  gap-2 md:flex-row flex-col w-full h-full border border-red-600 overflow-hidden outline-none">

    <!-- End Navigation Toggle -->
    <!-- Sidebar -->
    <div id="docs-sidebar" class="h-screen flex-1 border border-blue-900 static">

      <nav class="hs-accordion-group p-6 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
        <ul class="space-y-1.5">
          <li>
            <a class="flex items-center gap-x-3.5 py-2 px-2.5 bg-gray-100 text-sm text-gray-700 rounded-lg hover:bg-gray-400 dark:bg-neutral-700 dark:text-white" href="/views/Admin/dashboard.php">
              <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                <polyline points="9 22 9 12 15 12 15 22" />
              </svg>
              Dashboard
            </a>
          </li>

          <a href="/views/Admin/dashboard.php?student" class="flex items-center gap-x-3.5 py-2 px-2.5 bg-gray-100 text-sm text-gray-700 rounded-lg hover:bg-gray-400 dark:bg-neutral-700 dark:text-white" id="users-accordion">

            <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
              <circle cx="9" cy="7" r="4" />
              <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
              <path d="M16 3.13a4 4 0 0 1 0 7.75" />
            </svg>

            Students


          </a>

          <a href="/views/Admin/dashboard.php?subject" class="flex items-center gap-x-3.5 py-2 px-2.5 bg-gray-100 text-sm text-gray-700 rounded-lg hover:bg-gray-400 dark:bg-neutral-700 dark:text-white" id="account-accordion">

            <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="18" cy="15" r="3" />
              <circle cx="9" cy="7" r="4" />
              <path d="M10 15H6a4 4 0 0 0-4 4v2" />
              <path d="m21.7 16.4-.9-.3" />
              <path d="m15.2 13.9-.9-.3" />
              <path d="m16.6 18.7.3-.9" />
              <path d="m19.1 12.2.3-.9" />
              <path d="m19.6 18.7-.4-1" />
              <path d="m16.8 12.3-.4-1" />
              <path d="m14.3 16.6 1-.4" />
              <path d="m20.7 13.8 1-.4" />
            </svg>

            Subject


          </a>

          <a href="/views/Admin/dashboard.php?all_questions" class="flex items-center gap-x-3.5 py-2 px-2.5 bg-gray-100 text-sm text-gray-700 rounded-lg hover:bg-gray-400 dark:bg-neutral-700 dark:text-white" id="projects-accordion mb-3">
            <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M15.5 2H8.6c-.4 0-.8.2-1.1.5-.3.3-.5.7-.5 1.1v12.8c0 .4.2.8.5 1.1.3.3.7.5 1.1.5h9.8c.4 0 .8-.2 1.1-.5.3-.3.5-.7.5-1.1V6.5L15.5 2z" />
              <path d="M3 7.6v12.8c0 .4.2.8.5 1.1.3.3.7.5 1.1.5h9.8" />
              <path d="M15 2v5h5" />
            </svg>
            Questions
            </button>

          </a>


          <form action="/Core/logout.php" method="post" class="flex items-center gap-x-3.5 py-2 px-2.5 bg-gray-100 text-sm text-gray-700 rounded-lg hover:bg-gray-400 dark:bg-neutral-700 dark:text-white" id="projects-accordion ">
            <button type="submit" name="logout" class="text-red-500 text-sm px-3">Log out</button>
          </form>


        </ul>
      </nav>
    </div>
    <!-- End Sidebar -->

    <!-- main menu -->
    <div class="flex flex-[4] border flex-col overflow-hidden w-full h-screen">

      <div class="flex justify-between items-start p-4 px-5 w-full border-b-[1px]">

        <!-- hearder -->
        <div class="flex flex-col gap-2">
          <h2 class="text-3xl font-semibold text-gray-900">Welcome back, <?php echo $_SESSION['user']['first_name']  ?></h2>
          <p class="text-sm text-gray-600">Build and public your questions in no time.</p>
        </div>


      </div>


      <?php

      $uri =  $_SERVER["REQUEST_URI"];

      if ($uri === '/views/Admin/dashboard.php') {
        require("../partials/question.php");
      } elseif ($uri === '/views/Admin/dashboard.php?subject') {
        require("../partials/subject.php");
      } elseif ($uri === '/views/Admin/dashboard.php?student') {
        require("../partials/students.php");
      } elseif ($uri === '/views/Admin/dashboard.php?all_questions') {
        require("../partials/all_question.php");
      }

      ?>

    </div>
  </div>





  <script>
    const generateBtn = document.querySelector('.generate');
    const Btn = document.querySelector('.total');
    const formContainer = document.querySelector('.form-container');
    const publish = document.querySelector('.post');
    const addLevel = document.querySelector('.addLevel');
    const subject = document.querySelector('.subject');
    const level = document.querySelector('.level');
    const display = document.querySelector(".display")
    const Total_number_of_q = document.querySelector('.loop')
    const show_submit_btn = document.querySelector(".show_submit_btn")
    const surmit_all_forms = formContainer?.querySelector('.submit')
    const clear_subject = document.querySelector('.clear_subject')
    const subject_txt = document.querySelector('.subject_txt')

    clear_subject?.addEventListener("click", () => {
      subject_txt.value = "";
    })



    // cancel btn to return everything back to normal
    const cancel = document.querySelector(".cancel")?.addEventListener("click", () => {
        formContainer.innerHTML = "";
        display.classList.remove("hidden")
        Btn.value = '';
        Total_number_of_q.value = '';
        show_submit_btn.classList.add('hidden')
      })

     

    // button to generate the forms
    generateBtn.addEventListener('click', e => {

      if (Btn.value === "" || Btn.value > 10) {
        alert("Question number required and should not be more than 10")
        return
      }

      // hide the generate button once the user click on it
      display.classList.add('hidden')
      show_submit_btn.classList.remove("hidden")


    

      for (let i = 1; i <= Btn.value; i++) {

        const forms = document.createElement('div');
        forms.className = 'w-full border p-3 my-3';

        // add each form base on the number from the user input
        forms.innerHTML = `
          <div class="flex w-full border-b-[1px] py-2 gap-1" >
          <span class="p-2 border rounded shadow-sm font-extrabold text-gray-500 text-[10px]">Q${i}</span>
          <input type="text" required placeholder="Your question" class="border p-2 w-full rounded-sm" name="title-${i}">
          </div>

          <div class="options flex flex-col gap-2 mb-2">
          <input type="text" required placeholder="Option 1" class="border w-full rounded p-1 mt-2 " name="option_1_${i}">
          <input type="text" required placeholder="Option 2" class="border w-full rounded p-1 mt-1 " name="option_2_${i}">
          <input type="text" required placeholder="Option 3" class="border w-full rounded p-1 mt-1 " name="option_3_${i}">
          <input type="text" required placeholder="Option 4" class="border w-full rounded p-1 mt-1 " name="option_4_${i}">
          <input type="hidden" name="subject" value=${subject.value}>
          <input type="hidden" name="level" value=${level.value}>
          </div>

          <div class="correct mt-2 border-t-[1px] mt-3">
            <input type="text" required class="border w-full rounded p-1 mt-2" name="correct_${i}" placeholder="correct answer " >
          </div>

        
      `

        formContainer.appendChild(forms)
      }

      if (Btn.value !== "") {
        Total_number_of_q.value = Btn?.value;
      }
    })

 

  </script>

  <?php unset($_SESSION['subject']) ?>
</body>

</html>