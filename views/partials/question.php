<!-- questions pages prompt -->
<div class="flex justify-evenly items-center pt-4 pb-2 border-b-[1px] display">

  <!-- subject -->
  <div class="flex flex-col gap-2">
    <p class="text-gray-900 font-bold text-sm"> Subject</p>

    <select class="py-2 px-3 pe-9 block w-full border-gray-500 border rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none subject">

      <?php

      require('../../config/database.php');

      $db = new Database();
      $all_subject =  $db->query("SELECT * FROM subjects ")->fetchAll();

      foreach ($all_subject as $subject) {

      ?>




        <option><?php echo $subject['name'] ?></option>

      <?php } ?>
    </select>

  </div>

  <!-- difficulty level -->
  <div class="flex flex-col gap-2">
    <p class="text-gray-900 font-bold text-sm"> Difficulty</p>

    <select class="py-2 px-3 pe-9 block w-full border-gray-500 border rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none level" name="level">
      <option selected>easy</option>
      <option>medium</option>
      <option>difficult</option>
    </select>

  </div>

  <!-- number of question -->
  <div class="flex flex-col gap-2 ">
    <p class="text-gray-900 font-bold text-sm"> No of Question</p>

    <input type="number" class="py-2 px-3 pe-9 block w-full border-gray-500 border rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none  total" placeholder="no of question" max="10">

  </div>


  <button class="px-3 py-1 rounded bg-gray-950 text-white mt-5 generate addLevel">Generate</button>

</div>

<!-- form input -->

<div class="flex w-full  h-full border p-3  overflow-auto overflow-y-auto">

  <!-- main quiz -->
  <div class="quiz flex flex-col gap-3 border w-full rounded p-3 scroll-auto overflow-hidden outline-none">

    <div class="title flex items-center gap-2 border-b-[1px] px-3 py-2 ">
      <i class='bx bx-question-mark p-3 border rounded shadow-sm font-bold'></i>
      <div class="flex flex-col ">
        <p class="text-xl font-bold text-gray-900">Quiz</p>
        <p>Please complete the fields and choose the correct answer</p>
      </div>

    </div>

    <!-- each form -->
    <form class=" w-full p-2 outline-none overflow-y-auto overflow-auto" action="/Core/demo.php" method="post">


  <div class="flex items-center gap-3 hidden show_submit_btn">
  <button class="px-3 py-1 rounded bg-gray-950 text-white post submit" name="send" id="" >
        <i class='bx bx-cloud-upload ml-1'></i>
        publish
        <input type="hidden"  name="num" class="hidden loop">
      </button>
  <button type="button"  class="px-3 py-1 rounded border-gray-950 border text-gray-950 cancel" name="send"  >
        Cancel
      </button>

  </div>

  <div class="w-full form-container">

  </div>


    </form>



  </div>


</div>