<?php

use Core\{App, Database};

$db = App::resolve(Database::class);

$pizza = $db->query("select * from pizzas where id = :id", [
  "id" => $_GET["id"] ?? ""
])->fetch();

view("pizzas/show.view.php", [
  "pizza" => $pizza
]);
