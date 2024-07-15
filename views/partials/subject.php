
<div class="flex w-full items-center p-2 flex-col overflow-auto overflow-y-auto">

<form class="w-full " action="/Core/subject.php" method="post">
  <div class="flex items-center border-b border-teal-500 py-2">
    <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none subject_txt" type="text" placeholder="Subject" aria-label="Full name" name="subject" >
    <button <?php   ?> class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded" type="submit" name="add">
      Add Subject
    </button>
    <button  class="flex-shrink-0 border-transparent border-4 text-teal-500 hover:text-teal-800 text-sm py-1 px-2 rounded clear_subject" type="button" >
      Cancel
    </button>
  </div>
</form>
<?php if($_SESSION['subject'] ?? '') :?>
    <p class="text-red-500 text-xs italic"><?php var_dump( $_SESSION['subject']) ?></p>
 <?php endif ?>

<!-- All subject table  -->

<table class="table-auto w-full mt-5">
  <thead>
    <tr>
      <th class="px-4 py-2">No.</th>
      <th class="px-4 py-2">Subject</th>
      <th class="px-4 py-2">create at</th>
    </tr>
  </thead>
  <tbody>

  <?php 
  
require('../../config/database.php');

$db = new Database();
  $all_subject =  $db->query("SELECT * FROM subjects ")->fetchAll();

  foreach($all_subject as $subject){


  
  
  ?>
  
    <tr class="hover:bg-gray-100 border-b-[1px]">
      <td class="border-l-[1px] px-4 py-2"><?php echo $subject['id'] ?></td>
      <td class="border-l-[1px] px-4 py-2"><?php echo $subject['name'] ?></td>
      <td class="border-l-[1px] px-4 py-2"><?php echo $subject['created_at'] ?></td>
    </tr>

    <?php }?>
  
  </tbody>
</table>

</div>
