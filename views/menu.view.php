<?php include "partials/_header.php"; ?>

<main class="pt-24 w-full bg-gray-100">
  <!-- Page Title -->
  <div class="text-center py-10">
    <h1 class="text-5xl font-bold text-gray-800">All Our Pizzas</h1>
    <p class="mt-4 text-base text-gray-600">Explore our wide selection of delicious pizzas.</p>
  </div>

  <!-- Pizzas Grid Section -->
  <section class="py-12">
    <div class="container mx-auto px-4">
      <!-- Cards Grid for Pizzas -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <?php foreach ($pizzas as $pizza) : ?>
          <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <img class="w-full" src="path-to-pizza-image.jpg" alt="<?= $pizza["name"] ?>">
            <div class="p-4">
              <h3 class="text-lg font-bold"><?= $pizza["name"] ?></h3>
              <p class="text-sm text-gray-600 mt-1"><?= $pizza["description"] ?></p>
              <div class="flex items-center justify-between mt-3">
                <span class="text-lg font-bold"><?= $pizza["price"] . " €" ?></span>
                <a href="/pizza?id=<?= $pizza["id"] ?>" class="bg-orange-500 text-white px-3 py-1 rounded hover:bg-orange-600">Bestellen</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
</main>
