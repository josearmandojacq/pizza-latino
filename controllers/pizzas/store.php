<?php

use Core\{App, Database};

$db = App::resolve(Database::class);

$pizzaName = $_POST["pizzaName"];
$pizzaDescription = $_POST["pizzaDescription"];
$pizzaPreis = $_POST["pizzaPrice"];


$target_dir = __DIR__ . '/../../public/uploads/';
$originalFileName = basename($_FILES["pizzaImage"]["name"]);
$imageFileType = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));

$uniqueFileName = uniqid("img_", true) . '.' . $imageFileType;
$target_file = $target_dir . $uniqueFileName;

if (isset($_POST["submit"])) {
  $check = getimagesize($_FILES["pizzaImage"]["tmp_name"]);
  if ($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
  } else {
    echo "File is not an image.";
    exit;
  }
}

if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  exit;
}

if ($_FILES["pizzaImage"]["size"] > 5000000) {
  echo "Sorry, your file is too large.";
  exit;
}

if (
  $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif"
) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  exit;
}

if (move_uploaded_file($_FILES["pizzaImage"]["tmp_name"], $target_file)) {
  $pizza = $db->query(
    "INSERT INTO pizzas(name, description, price, image) 
        VALUES(:name, :description, :price, :image)",
    [
      "name" => $pizzaName,
      "description" => $pizzaDescription,
      "price" => $pizzaPreis,
      "image" => $uniqueFileName
    ]
  );
} else {
  echo "Sorry, there was an error uploading your file.";
}

header("location: /menu");
