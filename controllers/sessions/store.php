<?php

use Core\{App, Database, Validator};

$db = App::resolve(Database::class);

$email = $_POST["email"];
$password = $_POST["password"];

$errors = [];

if (!Validator::email($email)) {
  $errors["email"] = "Please provide a valid email address";
}

if (!Validator::password($password)) {
  $errors["password"] = "Please provide a password";
}

if (!empty($errors)) {
  return view("sessions/create.view.php", [
    "errors" => $errors
  ]);
}

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

$errors = [
  "general" => "Ungültiges Email oder Passwort"
];

$_SESSION["_flash"]["errors"] = $errors;
$_SESSION["_flash"]["old"]["email"] = $email;

return redirect("/login");
