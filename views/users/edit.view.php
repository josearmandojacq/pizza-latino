<?php include __DIR__ . "/../partials/_header.php" ?>

<main class="pt-24 w-full bg-gray-100">
  <div class="flex items-center justify-center">
    <div class="max-w-md w-full space-y-8">
      <div class="text-center">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Kontoverwaltung</h2>
      </div>
      <form class="mt-8 space-y-6" action="/users/update" method="POST">
        <input type="hidden" name="userId" value="<?= htmlspecialchars($user['id']) ?>">

        <div class="rounded-md shadow-sm space-y-4">
          <!-- Name -->
          <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input id="name" name="name" type="text" required value="<?= htmlspecialchars($user['name']) ?>" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-orange-500 focus:border-orange-500 focus:z-10 sm:text-sm">
          </div>

          <!-- Email -->
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700">E-Mail</label>
            <input id="email" name="email" type="email" required value="<?= htmlspecialchars($user['email']) ?>" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-orange-500 focus:border-orange-500 focus:z-10 sm:text-sm">
          </div>

          <!-- Address -->
          <div>
            <label for="address" class="block text-sm font-medium text-gray-700">Adresse</label>
            <input id="address" name="address" type="text" required value="<?= htmlspecialchars($user['address']) ?>" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-orange-500 focus:border-orange-500 focus:z-10 sm:text-sm">
          </div>
        </div>

        <div>
          <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
            Änderungen speichern
          </button>
        </div>
      </form>
    </div>
  </div>
</main>
