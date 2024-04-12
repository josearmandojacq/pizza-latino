<?php include __DIR__ . "/../partials/_header.php" ?>

<main class="pt-24 w-full bg-gray-100">
  <div class="flex items-center justify-center">
    <div class="max-w-md w-full space-y-8">
      <div class="text-center">
        <h2 class="mt-6 text-3xl font-extrabold text-gray-900">Edit Pizza</h2>
      </div>
      <form class="mt-8 space-y-6" action="/pizza/update" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="pizzaId" value="<?= htmlspecialchars($pizza['id']) ?>">

        <div class="rounded-md shadow-sm space-y-4">
          <!-- Pizza Name -->
          <div>
            <label for="pizza-name" class="block text-sm font-medium text-gray-700">Pizza Name</label>
            <input id="pizza-name" name="pizzaName" type="text" required value="<?= htmlspecialchars($pizza['name']) ?>" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-orange-500 focus:border-orange-500 focus:z-10 sm:text-sm">
          </div>

          <!-- Pizza Description -->
          <div>
            <label for="pizza-description" class="block text-sm font-medium text-gray-700">Description</label>
            <input id="pizza-description" name="pizzaDescription" type="text" required value="<?= htmlspecialchars($pizza['description'] ?? "") ?>" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-orange-500 focus:border-orange-500 focus:z-10 sm:text-sm">
          </div>

          <!-- Pizza Price -->
          <div>
            <label for="pizza-price" class="block text-sm font-medium text-gray-700">Price (€)</label>
            <input id="pizza-price" name="pizzaPrice" type="text" inputmode="decimal" required value="<?= htmlspecialchars($pizza['price']) ?>" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-orange-500 focus:border-orange-500 focus:z-10 sm:text-sm">
          </div>

          <!-- Pizza Image Upload -->
          <div>
            <label for="pizza-image" class="block text-sm font-medium text-gray-700">Pizza Image</label>
            <input id="pizza-image" name="pizzaImage" type="file" class="mt-1 block w-full file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-orange-500 file:text-white hover:file:bg-orange-600">
            <span class="block text-sm text-gray-600">Current image:</span>
            <?php if (isset($pizza["image"]) && $pizza["image"] != "") : ?>
              <!-- Display the current image -->
              <img src="/uploads/<?= $pizza["image"] ?>" alt="Current Pizza Image" class="mt-2 max-h-32 w-auto">
            <?php else : ?>
              <!-- Placeholder if no image is available -->
              <span class="block text-sm text-gray-600">No image available</span>
            <?php endif; ?>
          </div>
        </div>

        <div>
          <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
            Update Pizza
          </button>
        </div>
      </form>
    </div>
  </div>
</main>
