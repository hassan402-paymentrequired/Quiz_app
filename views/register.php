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

<?php include ("views/partials/navbar.php") ?>



<h2 class="text-center text-3xl font-bold my-7">Register to continue</h2>

<div class="flex w-full items-center justify-center h-full" >
<form class="w-full max-w-lg " method="post" action="/Core/register.php">
  <div class="flex flex-wrap -mx-3 mb-3">
    <div class="w-full md:w-1/2 px-3 mb-4 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
        First Name
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Jane" name="first_name">
     <?php if($_SESSION['all_errors'] ?? []) :?>
      <p class="text-red-500 text-xs italic"><?php echo $_SESSION['all_errors'][1]['first'] ?? '' ?></p>
      <?php endif ?>
    </div>
    <div class="w-full md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
        Last Name
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe" name="last_name">
      <?php if($_SESSION['all_errors'] ?? []) :?>
      <p class="text-red-500 text-xs italic"><?php echo $_SESSION['all_errors'][2]['last'] ?? '' ?></p>
      <?php endif ?>
    </div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
        Email
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-email" type="text" placeholder="joe@gmail" name="email">
      <?php if($_SESSION['all_errors'] ?? []) :?>
      <p class="text-red-500 text-xs italic"><?php echo $_SESSION['all_errors'][0]['email'] ?? $_SESSION['email']  ?? ''   ?></p>
      <?php elseif($_SESSION['email']  ?? '') :  ?>
        <p class="text-red-500 text-xs italic"><?php echo $_SESSION['email'] ?? ''  ?></p>
      <?php endif ?>
    </div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-2">
    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
        Password
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="password" placeholder="******************" name="password">
      <?php if($_SESSION['all_errors'] ?? []) :?>
      <p class="text-red-500 text-xs italic"><?php echo  $_SESSION['all_errors'][4]['password'] ?? ''  ?></p>
      <?php endif ?>
    </div>
    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
        Role
      </label>
      <div class="relative">
        <select name="role" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
            <option>student</option>
          <option>Admin</option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
        </div>
      </div>
    </div>
    <div class="w-full md:w-1/3 px-3 mb-3 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
        Phone NO
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-zip" type="text" placeholder="+234****" name="phone">
      <?php if($_SESSION['all_errors'] ?? []) :?>
      <p class="text-red-500 text-xs italic"><?php echo  $_SESSION['all_errors'][3]['phone'] ?? '' ?></p>
      <?php endif ?>
    </div>

    <div class="flex justify-between items-center w-full px-5 mb-2">
        <a href="/login" class="text-sm font-normal text-blue-400">Already have an account? <span class="underline">Login</span></a>
        <a href="#" class="text-sm font-bold text-blue-400">Forgot Password</a>
    </div>
  </div>
 <div class="flex justify-end items-center mt-2">
 <button type="submit" name="create" class="py-1  border-none rounded bg-green-400 text-white w-full">Submit</button>
 </div>
</form>
</div>





<?php unset($_SESSION['all_errors']) ?>
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
