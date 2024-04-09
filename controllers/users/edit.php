<?php
$user = [
  "id" => $_SESSION["user"]["id"],
  "name" => $_SESSION["user"]["name"],
  "email" => $_SESSION["user"]["email"],
  "address" => $_SESSION["user"]["address"]
];

view("users/edit.view.php", [
  "user" => $user
]);
