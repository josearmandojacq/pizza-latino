<?php

use Core\{App, Database};

$db = App::resolve(Database::class);

$pizzaId = $_POST["pizzaId"];
$pizzaName = $_POST["pizzaName"];
$pizzaDescription = $_POST["pizzaDescription"];
$pizzaPrice = $_POST["pizzaPrice"];

$setClause = "name = :name, description = :description, price = :price";

$values = [
  ':id' => $pizzaId,
  ':name' => $pizzaName,
  ':description' => $pizzaDescription,
  ':price' => $pizzaPrice,
];

$db->query(
  "UPDATE pizzas SET $setClause WHERE id = :id",
  $values
);

if (isset($_FILES['image'])) {
  $totalFiles = count($_FILES['image']['name']);
  $allowed = ["jpg" => "image/jpeg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png"];

  for ($i = 0; $i < $totalFiles; $i++) {
    if ($_FILES['image']['error'][$i] == 0) {
      $filename = bin2hex(random_bytes(16)) . "-" . $_FILES['image']['name'][$i];
      $filesize = $_FILES["image"]["size"][$i];
      $filetype = $_FILES["image"]["type"][$i];

      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

      $maxsize = 2 * 1024 * 1024;
      if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

      $tmpName = $_FILES['image']['tmp_name'][$i];

      $destination =  __DIR__ . '/../../uploads/' . $filename;

      if (file_exists($destination . $filename)) die("Error file: " . $filename . " already exists.");

      if (move_uploaded_file($tmpName, $destination)) {
        $db->query(
          "insert into images(path, pizza_id) values(:path, :pizza_id)",
          [
            "path" => $filename,
            "pizza_id" => $pizzaId
          ]
        );
      } else {
        throw new \Exception("Bild könnte nicht kopiert worden");
      }
    }
  }
}

header("location: /menu");
