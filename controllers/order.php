<?php

use Core\{App, Database};

$db = App::resolve(Database::class);
$user = $db->query("select * from users where id = :id", [
  "id" => $_SESSION["user"]["id"]
])->fetch();

$pizza = $db->query("select * from pizzas where id = :id", [
  "id" => $_POST["pizza-id"] ?? ""
])->fetch();

$order = [
  "pizzaName" => $pizza["name"],
  "pizzaPrice" => (float)$_POST["price"],
  "pizzaSize" => $_POST["size"],
  "pizzaExtras" => $_POST["extras"] ?? [],
  "specialWishes" => $_POST["special_wishes"],
  "userName" => $user["name"],
  "userAddress" => $user["address"]
];

view("order.view.php", [
  "order" => $order
]);
