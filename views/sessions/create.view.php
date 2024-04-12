<?php require __DIR__ . "/../partials/_header.php" ?>

<div class="flex items-center justify-center min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md w-full space-y-8">
    <div>
      <h2 class="mt-6 text-center text-3xl font-extrabold text-black-900 dark:text-black">
        Melden Sie sich an
      </h2>
    </div>
    <form class="mt-8 space-y-6" action="/login" method="POST">
      <input type="hidden" name="remember" value="true">
      <div class="rounded-md shadow-sm -space-y-px">
        <div>
          <label for="email-address" class="sr-only">Email address</label>
          <input id="email-address" name="email" type="email" autocomplete="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-orange-500 focus:border-orange-500 focus:z-10 sm:text-sm" placeholder="Email address">
          <?php if (isset($errors["email"])) : ?>
            <p class="mt-2 text-sm text-red-600"><?php echo htmlspecialchars($errors["email"]) ?></p>
          <?php endif; ?>
        </div>
        <div>
          <label for="password" class="sr-only">Password</label>
          <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-orange-500 focus:border-orange-500 focus:z-10 sm:text-sm" placeholder="Password">
          <?php if (isset($errors["password"])) : ?>
            <p class="mt-2 text-sm text-red-600"><?php echo htmlspecialchars($errors["password"]) ?></p>
          <?php endif; ?>
        </div>
      </div>
      <?php if (isset($errors["general"])) : ?>
        <p class="mt-2 text-sm text-red-600"><?php echo htmlspecialchars($errors["general"]) ?></p>
      <?php endif; ?>
      <div>
        <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
          Sign in
        </button>
      </div>
    </form>
  </div>
</div>
