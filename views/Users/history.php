<?php $user = $_SESSION['user'];


$user_id = $user['id'];

// var_dump($user_id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<?php require ('./views/partials/navbar.php') ?>



<div class="flex w-full items-center p-2 flex-col">
    <h1 class="text-center py-2 w-full text-3xl font-bold">History</h1>
<table class="table-auto w-full mt-5">
  <thead>
    <tr>
      <th class="px-4 py-2">Subject</th>
      <!-- <th class="px-4 py-2">Score</th> -->
      <th class="px-4 py-2">Percentage</th>
      <th class="px-4 py-2">Date</th>
    </tr>
  </thead>
  <tbody>

  <?php 
  
include('./config/database.php');

$db = new Database();
  $all_subject =  $db->query("SELECT * FROM history where user_id = $user_id ")->fetchAll();

//   var_dump($all_subject);

  foreach($all_subject as $subject){

    $subject_id = $subject["id"];

    $subject_name =  $db->query("SELECT * FROM subjects where id = $subject_id ")->fetch();
  
  
  ?>
  
    <tr class="hover:bg-gray-100 border-b-[1px]">
      <td class="border-l-[1px] px-4 py-2"><?php echo $subject_name['name'] ?? 'Unknown' ?></td>
      <!-- <td class="border-l-[1px] px-4 py-2"><?php// echo $subject['total'] ?? '5' ?></td> -->
      <td class="border-l-[1px] px-4 py-2"><?php echo $subject['percent'] ?></td>
      <td class="border-l-[1px] px-4 py-2"><?php echo $subject['created_at'] ?></td>
    </tr>

    <?php }?>
  
  </tbody>
</table>
</div>
</body>
</html>