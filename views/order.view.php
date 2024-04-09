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
                        Übersicht der Bestellung und Informationen
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
                                <?= implode(", ", $order["pizzaExtras"]) ?>
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Sonderwünsche
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <?= htmlspecialchars($order["specialWishes"], ENT_QUOTES, 'UTF-8') ?>
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
            <div class="mt-6 flex items-center space-x-4">
                <!-- Pay Button -->
                <div class="mt-6">
                    <button id="payBtn" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" onclick="showDownloadButton()">
                        Bezahlen
                    </button>
                </div>
                <div class="mt-6">
                    <a href="/menu"
                       class="bg-orange-500 text-white text-base px-6 py-2 rounded hover:bg-orange-600 inline-flex items-center justify-center">Züruck</a>
                </div>
                <!-- Download Invoice Form (hidden initially) -->
                <div class="mt-6" style="display: none;" id="downloadBtnDiv">
                    <form action="/generate_invoice" method="POST">
                        <input type="hidden" name="userName" value="<?= htmlspecialchars($order["userName"]) ?>">
                        <input type="hidden" name="userAddress" value="<?= htmlspecialchars($order["userAddress"]) ?>">
                        <input type="hidden" name="pizzaName" value="<?= htmlspecialchars($order["pizzaName"]) ?>">
                        <input type="hidden" name="pizzaSize" value="<?= htmlspecialchars($order["pizzaSize"]) ?>">
                        <input type="hidden" name="pizzaPrice" value="<?= htmlspecialchars($order["pizzaPrice"]) ?>">
                        <input type="hidden" name="pizzaExtras"
                               value="<?= htmlspecialchars(implode(", ", $order["pizzaExtras"])) ?>">
                        <input type="hidden" name="specialWishes"
                               value="<?= htmlspecialchars($order["specialWishes"]) ?>">

                        <button id="invoice" type="submit"
                                class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                            Rechnung herunterladen
                        </button>
                    </form>
                </div>
            </div>
            <div class="mt-2" style="display: none;" id="successMessageDiv">
                <p id="successMessage" class="text-green-500"></p>
            </div>


    </section>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const payButton = document.getElementById('payBtn');
        const successMessageDiv = document.getElementById('successMessageDiv');
        const successMessage = document.getElementById('successMessage');

        const orderData = {
            userName: "<?= htmlspecialchars($order["userName"]) ?>",
            userId: "<?= $order["userId"] ?>",
            userAddress: "<?= htmlspecialchars($order["userAddress"]) ?>",
            pizzaId: "<?= $order["pizzaId"] ?>",
            pizzaName: "<?= htmlspecialchars($order["pizzaName"]) ?>",
            pizzaSize: "<?= htmlspecialchars($order["pizzaSize"]) ?>",
            pizzaPrice: "<?= htmlspecialchars($order["pizzaPrice"]) ?>",
            pizzaExtras: "<?= htmlspecialchars(implode(", ", $order["pizzaExtras"])) ?>",
            specialWishes: "<?= htmlspecialchars($order["specialWishes"]) ?>"
        };

        payButton.addEventListener('click', function (e) {
            fetch('/pizza/pay', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(orderData),
            })
                .then(response => response.json())
                .then(data => {
                    console.log('Success:', data);
                    showDownloadButton();
                })
                .catch((error) => {
                    console.error('Error:', error);
                    alert('An error occurred while processing your payment.');
                });
        });
    });
</script>
<script>
    function showDownloadButton() {
        const payButton = document.getElementById('payBtn');
        const downloadBtnDiv = document.getElementById('downloadBtnDiv');
        const successMessageDiv = document.getElementById('successMessageDiv');
        const successMessage = document.getElementById('successMessage');

        payButton.style.display = 'none';
        downloadBtnDiv.style.display = 'block';

        successMessage.textContent = 'Zahlung erfolgreich verarbeitet!';
        successMessageDiv.style.display = 'block';
    }
</script>
