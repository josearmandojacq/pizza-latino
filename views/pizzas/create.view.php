<?php include __DIR__ . "/../partials/_header.php" ?>

<main class="pt-24 w-full bg-gray-100">
  <div class="flex items-center justify-center">
    <div class="max-w-md w-full space-y-8">
      <div class="text-center">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Neue Pizza erstellen</h2>
      </div>
      <form class="mt-8 space-y-6" action="/pizza" method="POST" enctype="multipart/form-data">
        <div class="rounded-md shadow-sm space-y-4">
          <!-- Pizza Name -->
          <div>
            <label for="pizza-name" class="block text-sm font-medium text-gray-700">Pizza Name</label>
            <input id="pizza-name" name="pizzaName" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-orange-500 focus:border-orange-500 focus:z-10 sm:text-sm" placeholder="Name">
          </div>

          <!-- Pizza Description -->
          <div>
            <label for="pizza-description" class="block text-sm font-medium text-gray-700">Beschreibung</label>
            <input id="pizza-description" name="pizzaDescription" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-orange-500 focus:border-orange-500 focus:z-10 sm:text-sm" placeholder="Eine leckere Pizza mit...">
          </div>

          <!-- Pizza Price -->
          <div>
            <label for="pizza-price" class="block text-sm font-medium text-gray-700">Preis (€)</label>
            <input id="pizza-price" name="pizzaPrice" type="text" inputmode="decimal" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-orange-500 focus:border-orange-500 focus:z-10 sm:text-sm" placeholder="Preis">
          </div>

          <!-- Pizza Image Upload -->
          <div>
            <label for="pizza-image" class="block text-sm font-medium text-gray-700">Pizza Bild</label>
            <input id="pizza-image" name="pizzaImage" type="file" class="mt-1 block w-full file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-orange-500 file:text-white hover:file:bg-orange-600">
          </div>
        </div>

        <div>
          <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
            Pizza erstellen
          </button>
        </div>
      </form>
    </div>
  </div>
</main>
