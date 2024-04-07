<?php

use Core\{App, Database, Validator};

$email = $_POST["email"];
$password = $_POST["password"];
$confirmPassword = $_POST["confirmPassword"];
$name = $_POST["fullName"];
$address = $_POST["address"];

$errors = [];

if (!Validator::email($email)) {
  $errors["email"] = "Bitte geben Sie eine gültige E-Mail-Adresse an.";
}

if (!Validator::checkPassword($password, $confirmPassword)) {
  $errors["confirmPassword"] = "Passwörter stimmen nicht überein.";
}

if (!empty($errors)) {
  return view("registration/create.view.php", [
    "errors" => $errors
  ]);
}

$db = App::resolve(Database::class);

$user = $db->query(
  "select * from users where email = :email",
  [
    "email" => $email
  ]
)->fetch();

if ($user) {
  header("location: /");
  exit();
} else {
  $db->query(
    "insert into users(name, email, password, address) values(:name, :email, :password, :address)",
    [
      "email" => $email,
      "password" => password_hash($password, PASSWORD_DEFAULT),
      "name" => $name,
      "address" => $address
    ]
  );

  $user = $db->query(
    "select * from users where email = :email",
    [
      "email" => $email
    ]
  )->fetch();


  if ($user) {
    if (login($user, $password)) {
      header("location: /");
      die();
    }
  }
}
