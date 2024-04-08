<?php include "partials/_header.php"; ?>

<main class="pt-19 w-full">
  <!-- Full-width Hero Section with Background Image -->
  <div class="w-full text-center py-40" style="background-image: url('https://img.freepik.com/free-vector/restaurant-mural-wallpaper_23-2148698592.jpg?w=1380&t=st=1712412849~exp=1712413449~hmac=44cb375e6776dceabdd19430a02b339a44e821990dd3718555b36036f42c0059'); background-size: cover; background-position: center;">
    <div class="bg-black bg-opacity-50 p-10 rounded">
      <h1 class="text-5xl font-bold text-white">Pizza o Revrovie</h1>
      <p class="mt-4 text-base text-gray-200">Beneath its crisp surface lie twelve stout strips where the agile hawks float on chilly zephyrs that the espadrilles are bracing...</p>
    </div>
  </div>

  <!-- Menu Section -->
  <section class="py-12 bg-white">
    <div class="text-center">
      <h2 class="text-3xl font-bold text-gray-800 mb-8">Discover Our Menu</h2>
    </div>

    <div class="container mx-auto px-4">
      <!-- Cards Grid -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <?php foreach ($pizzas as $pizza) : ?>
          <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <img class="w-full" src="path-to-pizza-image.jpg" alt="<?= $pizza["name"] ?>">
            <div class="p-4">
              <h3 class="text-lg font-bold"><?= $pizza["name"] ?></h3>
              <p class="text-sm text-gray-600 mt-1"><?= $pizza["description"] ?></p>
              <div class="flex items-center justify-between mt-3">
                <span class="text-lg font-bold"><?= $pizza["price"] ?></span>
                <a href="/pizza?id=<?= $pizza["id"] ?>" class="bg-orange-500 text-white px-3 py-1 rounded hover:bg-orange-600">Bestellen</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- View All Button -->
      <div class="text-center mt-8">
        <a href="/menu" class="bg-orange-500 text-white px-3 py-1 rounded hover:bg-orange-600">View All</a>
      </div>
    </div>
  </section>

  <!-- Map Section -->
  <section class="py-12">
    <div class="container mx-auto px-4">
      <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Finden Sie uns</h2>
      <!-- Map Container -->
      <div id="map" style="height: 400px;" class="w-full"></div>
    </div>
    <div class="text-center">
      <p>Pizzeria Latino</p>
      <p>Bouchéstraße 18 Alt-Treptow 12435 Berlin</p>
    </div>
  </section>
</main>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    var map = L.map('map').setView([52.491016329052194, 13.449316928364688], 16);

    // Add OpenStreetMap tiles
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Add a marker
    var marker = L.marker([52.491016329052194, 13.449316928364688]).addTo(map);
    marker.bindPopup('Wir sind hier!').openPopup();
  })
</script>
