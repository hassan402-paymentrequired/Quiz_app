
<div class="flex w-full items-center p-2 flex-col">
    <h1 class="text-left w-full text-3xl font-bold">Students</h1>
<table class="table-auto w-full mt-5">
  <thead>
    <tr>
      <th class="px-4 py-2">First name</th>
      <th class="px-4 py-2">Last name</th>
      <th class="px-4 py-2">Email</th>
      <th class="px-4 py-2">Phone no</th>
    </tr>
  </thead>
  <tbody>

  <?php 
  
require('../../config/database.php');

$db = new Database();
  $all_subject =  $db->query("SELECT * FROM users where role = 'student' ")->fetchAll();

  foreach($all_subject as $subject){


  
  
  ?>
  
    <tr class="hover:bg-gray-100 border-b-[1px]">
      <td class="border-l-[1px] px-4 py-2"><?php echo $subject['first_name'] ?></td>
      <td class="border-l-[1px] px-4 py-2"><?php echo $subject['last_name'] ?></td>
      <td class="border-l-[1px] px-4 py-2"><?php echo $subject['email'] ?></td>
      <td class="border-l-[1px] px-4 py-2"><?php echo $subject['phone'] ?></td>
    </tr>

    <?php }?>
  
  </tbody>
</table>
</div>