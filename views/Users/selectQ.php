<?php
// session_start();
require('config/database.php');

$db = new Database();
$all_subject =  $db->query("SELECT * FROM subjects ")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
  <div class="flex items-center justify-center w-full h-screen bg-[url('https://img.freepik.com/premium-photo/pile-question-marks-with-golden-standing-out_698953-15054.jpg?w=826')] ">

    <!-- container -->
    <div class="w-1/2 shadow shadow-gray-400 flex flex-col backdrop-blur-xl  backdrop-brightness-100">

      <!-- header -->
      <div class="w-full h-10 border flex items-center bg-blue-400 justify-between">

        <a href="/" class="flex items-center gap-2 h-full  bg-orange-500">
          <i class='bx bx-home-alt text-2xl px-3'></i>
        </a>

        <p class="pr-5 px-1  rounded-xl  flex items-center justify-start  border-green-500 border py-0 gap-1 mr-4 bg-orange-500">
      <i class='bx bx-user-circle text-lg mt-1'></i>
       <span class="text-sm"><?php echo $_SESSION['user']['last_name'] ?? ''  ?></span>
      </p>


      </div>


      <!-- main -->
      <form action="Core/getSelectedQ.php" class="w-full p-3" method="get">
        <h2 class="text-xl font-bold p-2 w-full border-b-[1px] mt-4 mb-2 text-gray-100">Select one subject to Practice on</h2>

        <select class="py-2 px-3 pe-9 block w-full border-gray-500 border rounded text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none subject" name="subject">

          <?php foreach ($all_subject as $subject) {   ?>

            <option><?php echo $subject['name'] ?></option>

          <?php }  ?>
        </select>

        <!-- no of q -->

        <h2 class="text-xl font-bold p-2 w-full border-b-[1px] mt-4 mb-2 text-gray-100">Enter the number of question you would like to attempt</h2>

        <div class="flex flex-col gap-2">

          <input type="number" placeholder="total" class="  py-2 px-3 pe-9 block w-full border-gray-500 border rounded text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none level" name="num">
        </div>



        <h2 class="text-xl font-bold p-2 w-full border-b-[1px] mt-4 mb-2 text-gray-100">Select the level that suite yout trivial</h2>
        <!-- difficulty level -->
        <div class="flex flex-col gap-2">

          <select class="py-2 px-3 pe-9 block w-full border-gray-500 border rounded text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none level" name="level">
            <option selected>easy</option>
            <option>medium</option>
            <option>difficult</option>
          </select>

        </div>

      
       <div class="flex w-full my-5 items-center justify-center">
       <button name="get" type="submit" class="px-10 py-2  text-white  border-none bg-orange-500">Get started</button>

       </div>

      </form>

    </div>


  </div>
</body>

</html>