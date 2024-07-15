

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="./input.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>

<?php require ("views/partials/navbar.php") ?>

<h2 class="text-center text-3xl font-bold my-7">Welcome back</h2>

<div class="flex w-full items-center justify-center h-full" >
<form class="w-full max-w-lg " method="post" action="/Core/login.php">
  <div class="flex flex-wrap -mx-3 mb-6">
  <div class="w-full px-3 mb-5">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
        Email
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-email" type="text" placeholder="joe@gmail" name="email">
      <?php if( $_SESSION['error'] ?? '') :?>
      <p class="text-red-500 text-xs italic"><?php echo $_SESSION['error']?? ''  ?></p>
      <?php endif ?>
    </div>
    <div class="w-full  px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
        password
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="password" placeholder="****" name="password">
      <?php if($_SESSION['error'] ?? '') :?>
      <p class="text-red-500 text-xs italic"><?php echo $_SESSION['error'] ?></p>
      <?php endif ?>
    </div>
    <div class="flex justify-between items-center w-full px-5 mt-1">
          <a href="/register" class="text-sm font-normal text-blue-400">Don't have an account? <span class="underline">Register</span></a>
          <a href="#" class="text-sm font-bold text-red-400 underline">Forgot Password</a>
      </div>
  </div>
  
 <div class="flex justify-end items-center mt-2">
 <button type="submit" name="login" class="py-1 px-5 border-none rounded bg-green-400 text-white w-full">Login</button>
 </div>
</form>
</div>





<?php unset($_SESSION['error']) ?>
<?php unset($_SESSION['email'] ) ?>


<script>

    const parent = document.querySelector('.parent')
    const menu = document.querySelector('.close')

    menu.addEventListener("click", e => {
        parent.classList.add('collase')
        // console.log(menu.parentNode);
    })
    
</script>
</body>
</html>
