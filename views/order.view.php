<?php include "partials/_header.php"; ?>
<main class="pt-24 w-full bg-gray-100">
  <!-- Invoice Section -->
  <section class="py-12">
    <div class="container mx-auto px-4">
      <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
          <h3 class="text-lg leading-6 font-medium text-gray-900">
            Bestellung
          </h3>
          <p class="mt-1 max-w-2xl text-sm text-gray-500">
            Überrsicht der Bestellung und Informationen
          </p>
        </div>
        <div class="border-t border-gray-200">
          <dl>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">
                Name
              </dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <?= $order["userName"] ?>
              </dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">
                Lieferung Adresse
              </dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <?= $order["userAddress"] ?>
              </dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">
                Bestellte Pizza
              </dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <?= $order["pizzaName"] ?>
              </dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">
                Größe
              </dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <?= $order["pizzaSize"] ?>
              </dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">
                Menge
              </dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                1
              </dd>
            </div>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">
                Extras
              </dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <?= implode(", ", $order["specialWishes"]) ?>
              </dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">
                Price
              </dt>
              <dd class="mt-1 text-sm text-gray-900 font-bold sm:mt-0 sm:col-span-2">
                <?= $order["pizzaPrice"] . " €" ?>
              </dd>
            </div>
          </dl>
        </div>
      </div>

      <!-- Pay Button -->
      <div class="mt-6">
        <button id="payBtn" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" onclick="showDownloadButton()">
          Bezahlen
        </button>
      </div>

      <!-- Download Invoice Form (hidden initially) -->
      <div class="mt-6" style="display: none;" id="downloadBtnDiv">
        <form action="/generate_invoice" method="POST">
          <input type="hidden" name="userName" value="<?= htmlspecialchars($order["userName"]) ?>">
          <input type="hidden" name="userAddress" value="<?= htmlspecialchars($order["userAddress"]) ?>">
          <input type="hidden" name="pizzaName" value="<?= htmlspecialchars($order["pizzaName"]) ?>">
          <input type="hidden" name="pizzaSize" value="<?= htmlspecialchars($order["pizzaSize"]) ?>">
          <input type="hidden" name="pizzaPrice" value="<?= htmlspecialchars($order["pizzaPrice"]) ?>">
          <input type="hidden" name="specialWishes" value="<?= htmlspecialchars(implode(", ", $order["specialWishes"])) ?>">

          <button id="invoice" type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            Rechnung herunterladen
          </button>
        </form>
      </div>
    </div>
  </section>
</main>

<script>
  function showDownloadButton() {
    document.getElementById('payBtn').style.display = 'none';
    document.getElementById('downloadBtnDiv').style.display = 'block';
  }
</script>
