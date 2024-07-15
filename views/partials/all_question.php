
<div class="w-full overflow-auto overflow-y-auto">

<table class="table-auto w-full mt-5 ">
  <thead>
    <tr>
      <th class="px-4 py-2">Rank</th>
      <th class="px-4 py-2">Question</th>
      <th class="px-4 py-2">level</th>
      <th class="px-4 py-2">Question</th>
    </tr>
  </thead>
  <tbody>

  <?php 
  
require('../../config/database.php');

$db = new Database();
  $all_subject =  $db->query("SELECT  i.*, s.name FROM questions i  left JOIN subjects s ON i.subject_id = s.id")->fetchAll();

  foreach($all_subject as $subject){


  
  
  ?>
  
    <tr class="hover:bg-gray-100 border-b-[1px]">
      <td class="border-l-[1px] px-4 py-2"><?php echo $subject['id'] ?></td>
      <td class="border-l-[1px] px-4 py-2"><?php echo $subject['name'] ?></td>
      <td class="border-l-[1px] px-4 py-2"><?php echo $subject['difficulty'] ?></td>
      <td class="border-l-[1px] px-4 py-2 "><?php echo $subject['title'] ?></td>
    </tr>

    <?php }?>
  
  </tbody>
</table>
</div>