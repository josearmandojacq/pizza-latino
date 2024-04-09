<?php

use Core\{App, Database};

$db = App::resolve(Database::class);

$content = file_get_contents('php://input');
$valuesArray = json_decode($content, true);


$order = $db->query(
  "insert into orders(user_id, pizza_id) values(:user_id, :pizza_id)",
  [
    "user_id" => $valuesArray["userId"],
    "pizza_id" => $valuesArray["pizzaId"]
  ]
);

echo json_encode($valuesArray);
