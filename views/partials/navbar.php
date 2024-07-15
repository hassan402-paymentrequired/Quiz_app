<?php // session_start() ?>
<header class="bg-white border-b-[1px] z-100">
  <nav class="mx-auto flex max-w-7xl items-center justify-between p-4 lg:px-8" aria-label="Global">
    <div class="flex lg:flex-1">
      <a href="#" class="-m-1.5 p-1.5 text-2xl font-bold">
        <span class="text-gray-800 font-itelic" >E</span>
        code
      </a>
    </div>
    <div class="flex lg:hidden">
      <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
        <span class="sr-only">Open main menu</span>
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
      </button>
    </div>
    <div class="hidden lg:flex lg:gap-x-12 mr-5">
      <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Home</a>
      <a href="/leaderboard" class="text-sm font-semibold leading-6 text-gray-900">Leaderboard</a>
      <a href="/history" class="text-sm font-semibold leading-6 text-gray-900">history</a>
    </div>
    <!-- display cart and profile if login in -->
  

  
      <div class="hidden lg:flex lg:flex-1 lg:justify-end">

      <?php if($_SESSION['user'] ?? []):?>

     <p class="pr-5 px-1  rounded-xl  flex items-center justify-start  border-green-500 border py-0 gap-1">
      <i class='bx bx-user-circle text-lg mt-1'></i>
       <span class="text-sm"><?php echo $_SESSION['user']['last_name'] ?? ''  ?></span>
      </p>

      <?php else :?>
      <a href="/register" class="text-sm font-semibold leading-6 text-gray-900">Log in <span aria-hidden="true">&rarr;</span></a>
    
    <?php endif?>

    <?php if($_SESSION['user'] ?? []):?>
    <form action="/Core/logout.php" method="post">
      <button type="submit" name="logout" class="text-red-500 text-sm px-3">Log out</button>
    </form>
    <?php endif?>
    </div>
     
  </nav>
  <!-- Mobile menu, show/hide based on menu open state. -->
  <div class="lg:hidden parent" role="dialog" aria-modal="true">
    <!-- Background backdrop, show/hide based on slide-over state. -->
    <div class="fixed inset-0 z-10"></div>
    <div class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
      <div class="flex items-center justify-between">
        <a href="#" class="-m-1.5 p-1.5">
          <span class="sr-only">Your Company</span>
          <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
        </a>
        <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700 close">
          <span class="sr-only">Close menu</span>
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="mt-6 flow-root">
        <div class="-my-6 divide-y divide-gray-500/10">
          <div class="space-y-2 py-6">
            <div class="-mx-3">
              <button type="button" class="flex w-full items-center justify-between rounded-lg py-2 pl-3 pr-3.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50" aria-controls="disclosure-1" aria-expanded="false">
                Product
            </div>
            <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Features</a>
            <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Marketplace</a>
            <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Company</a>
          </div>
          <div class="py-6">
            <a href="#" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Log in</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>