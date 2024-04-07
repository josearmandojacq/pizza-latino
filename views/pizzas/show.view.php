<?php include __DIR__ . "/../partials/_header.php" ?>
<main class="pt-24 w-full bg-gray-100">
  <!-- Pizza View Section -->
  <section class="py-12">
    <div class="container mx-auto px-4">
      <div class="flex flex-wrap -mx-4">
        <!-- Left Column for Text Content and Form -->
        <div class="w-full lg:w-1/2 px-4 mb-6 lg:mb-0">
          <form action="/orders" method="POST">
            <h2 class="text-3xl font-bold text-gray-800">Lecker <?= $pizza["name"] ?></h2>
            <p class="text-gray-600 mt-4"><?= $pizza["description"] ?></p>

            <input hidden value="<?= $pizza["id"] ?>" name="pizza-id" />

            <!-- Size Selector -->
            <div class="mt-6">
              <label for="size" class="block text-sm font-medium text-gray-700">Größe</label>
              <select id="size" name="size" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm rounded-md">
                <option value="26">26 cm</option>
                <option value="32">32 cm</option>
              </select>
            </div>

            <!-- Extras Selector -->
            <div class="mt-6">
              <label for="extras" class="block text-sm font-medium text-gray-700">Extras</label>
              <select id="extras" name="extras[]" multiple class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm rounded-md">
                <option value="Käse">🧀 Käse</option>
                <option value="Oliven">🫒 Oliven</option>
                <option value="Speck">🥓 Speck</option>
                <option value="Zwiebel">🧅 Zwiebel</option>
                <option value="Paprika">🫑 Paprika</option>
                <option value="Ananas">🍍 Ananas</option>
                <option value="Spinat">🍃 Spinat</option>
                <option value="Tomate">🍅 Tomate</option>
                <option value="Pilze">🍄 Pilze</option>
                <option value="Knoblauch">🧄 Knoblauch</option>
              </select>
            </div>

            <!-- Special Wishes Input -->
            <div class="mt-6">
              <label for="special-wishes" class="block text-sm font-medium text-gray-700">Sonderwünsche</label>
              <input type="text" id="special-wishes" name="special_wishes" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm rounded-md" placeholder="Haben Sie noch ein Wunsch?">
            </div>

            <!-- Price Display and Hidden Input -->
            <div class="mt-6">
              <span class="text-sm font-bold text-gray-700">Preis:</span>
              <span id="price-display" class="text-lg font-bold text-gray-900">8 €</span>

              <input type="hidden" id="price" name="price" value="8">
            </div>

            <!-- Buttons Container -->
            <div class="mt-6 flex justify-start space-x-4">
              <!-- Back Button -->
              <a href="/menu" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-gray-400">
                Zurück
              </a>

              <!-- Order Button -->
              <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">
                Bestellen
              </button>
            </div>
          </form>
        </div>

        <!-- Pizza Image -->
        <div class="w-full lg:w-1/2 px-4 flex justify-center lg:justify-end">
          <img class="rounded-lg shadow-lg" src="path-to-pizza-image.jpg" alt="Pepperoni Pizza" style="max-height: 500px;">
        </div>
      </div>
    </div>
  </section>
</main>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('size').addEventListener('change', function() {
      var price = this.value === '26' ? '8' : '10'; // Example price logic based on size
      document.getElementById('price-display').textContent = price + ' €';
      document.getElementById('price').value = price; // Update hidden input value
    });

    var extrasSelect = document.getElementById('extras');
    var choices = new Choices(extrasSelect, {
      removeItemButton: true,
      searchEnabled: false,
      placeholder: true,
      placeholderValue: 'Extras hinzufügen...',
      itemSelectText: '',
    });
  });
</script>
