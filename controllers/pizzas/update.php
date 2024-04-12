<?php

use Core\{App, Database};

$db = App::resolve(Database::class);

$pizzaId = $_POST["pizzaId"];
$pizzaName = $_POST["pizzaName"];
$pizzaDescription = $_POST["pizzaDescription"];
$pizzaPrice = $_POST["pizzaPrice"];

$setClause = "name = :name, description = :description, price = :price, image = :image";


$uniqueFileName = NULL;

// Check if an image file has been uploaded
if (isset($_FILES["pizzaImage"]["name"]) && $_FILES["pizzaImage"]["name"] != '') {
  $target_dir = __DIR__ . '/../../public/uploads/';
  $originalFileName = basename($_FILES["pizzaImage"]["name"]);
  $imageFileType = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));

  $uniqueFileName = uniqid("img_", true) . '.' . $imageFileType;
  $target_file = $target_dir . $uniqueFileName;

  if ($_FILES["pizzaImage"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    exit;
  }

  if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    exit;
  }

  if (!move_uploaded_file($_FILES["pizzaImage"]["tmp_name"], $target_file)) {
    echo "Sorry, there was an error uploading your file.";
    exit; // Exit if the file cannot be uploaded
  }
}

$values = [
  ':id' => $pizzaId,
  ':name' => $pizzaName,
  ':description' => $pizzaDescription,
  ':price' => $pizzaPrice,
  ':image' => $uniqueFileName
];

$db->query(
  "UPDATE pizzas SET $setClause WHERE id = :id",
  $values
);


header("location: /menu");
