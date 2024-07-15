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
<?php require ('./views/partials/navbar.php') ?>

<h1 class="text-center text-gray-900 mt-4 text-3xl font-bold">leaderboard</h1>
<p class="text-center text-gray-500 mt-2 text-lg font-bold"> Check out the leaderboard and see how you stack up against others!</p>

<!-- table -->

<div class="flex flex-col p-3 px-10">
  <div class="-m-1.5 overflow-x-auto">
    <div class="p-1.5 min-w-full inline-block align-middle">
      <div class="overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
          <thead>
            <tr>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-800 uppercase ">Rank</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-800 uppercase ">Name</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-800 uppercase ">Score</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-800 uppercase ">Subject</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">

          <?php  
          
          include ('./config/database.php');

          $db = new Database();

          $sql = " SELECT h.user_id, h.percent, u.first_name, u.last_name, u.email, s.name FROM history h LEFT JOIN users u ON h.user_id = u.id left join subjects s on h.subject_id = s.id";

          $getAllScore = $db->query($sql)->fetchAll();

          arsort($getAllScore);
          $key = 0;
          
          foreach($getAllScore as $index => $score) {
          ?>




            <tr class="hover:bg-gray-300">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800"><?php echo $index +1 ?></td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800"><?php echo $score['first_name'] ?></td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800"><?php echo $score['percent'] ?></td>
              <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium"><?php echo $score['name'] ?? 'unknown' ?></td>
            </tr>
          
            <?php }?>


          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</body>
</html>