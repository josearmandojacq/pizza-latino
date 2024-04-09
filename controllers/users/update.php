<?php

use Core\{App, Database};

$db = App::resolve(Database::class);

$userId = $_POST["userId"];
$userName = $_POST["name"];
$userEmail = $_POST["email"];
$userAddress = $_POST["address"];

$setClause = "name = :name, email = :email, address = :address";

$values = [
  ':id' => $userId,
  ':name' => $userName,
  ':email' => $userEmail,
  ':address' => $userAddress,
];

$db->query(
  "UPDATE users SET $setClause WHERE id = :id",
  $values
);

$_SESSION["user"]["name"] = $userName;
$_SESSION["user"]["email"] = $userEmail;
$_SESSION["user"]["address"] = $userAddress;


header("location: /");
