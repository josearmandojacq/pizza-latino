<?php

use Core\{App, Database};

$db = App::resolve(Database::class);

$pizzas = $db->query(
  "select * from pizzas limit 4"
)->fetchAll();

view("home.view.php", [
  "pizzas" => $pizzas
]);
