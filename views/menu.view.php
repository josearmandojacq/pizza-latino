<?php include "partials/_header.php"; ?>

<main class="pt-24 w-full bg-gray-100">
  <!-- Page Title -->
  <div class="text-center py-10">
    <h1 class="text-5xl font-bold text-gray-800">All Our Pizzas</h1>
    <p class="mt-4 text-base text-gray-600">Explore our wide selection of delicious pizzas.</p>
  </div>

  <?php if (isset($_SESSION["user"]) && $_SESSION["user"]["role"] === "admin") : ?>
    <div class="text-center mb-10">
      <a href="/pizza/new" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition duration-300 ease-in-out">
        Neue Pizza hinzufügen
      </a>
    </div>
  <?php endif; ?>

  <!-- Pizzas Grid Section -->
  <section class="py-12">
    <div class="container mx-auto px-4">
      <!-- Cards Grid for Pizzas -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <?php foreach ($pizzas as $pizza) : ?>
          <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <img class="w-full" src="path-to-pizza-image.jpg" alt="<?= htmlspecialchars($pizza["name"]) ?>">
            <div class="p-4">
              <h3 class="text-lg font-bold"><?= htmlspecialchars($pizza["name"]) ?></h3>
              <p class="text-sm text-gray-600 mt-1"><?= htmlspecialchars($pizza["description"] ?? "") ?></p>
              <div class="flex items-center justify-between mt-3">
                <span class="text-lg font-bold"><?= htmlspecialchars($pizza["price"]) . " €" ?></span>
                <?php if (isset($_SESSION["user"]) && $_SESSION["user"]["role"] === "admin") : ?>
                  <div class="flex items-center space-x-2">
                    <a href="/pizza/edit?id=<?= htmlspecialchars($pizza["id"]) ?>" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Anpassen</a>
                    <a href="/pizza/delete?id=<?= htmlspecialchars($pizza["id"]) ?>" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600" onclick="return confirm('Are you sure you want to delete this pizza?');">Löschen</a>
                  </div>
                <?php else : ?>
                  <a href="/order?pizzaId=<?= htmlspecialchars($pizza["id"]) ?>" class="bg-orange-500 text-white px-3 py-1 rounded hover:bg-orange-600">Bestellen</a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
</main>
