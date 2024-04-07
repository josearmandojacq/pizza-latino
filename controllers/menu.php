<?php

use Core\{App, Database};

$db = App::resolve(Database::class);

$pizzas = $db->query(
  "select * from pizzas"
)->fetchAll();

view("menu.view.php", [
  "pizzas" => $pizzas
]);
