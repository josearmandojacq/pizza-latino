<?php

function dd($value)
{
  echo "<pre>";
  var_dump($value);
  echo "</pre>";
  die();
}

function abort($code = 404)
{
  http_response_code($code);
  view("404.php");
  die();
}

function base_path($path): string
{
  return __DIR__ . "/../" . $path;
}

function view($path, $attributes = [])
{
  extract($attributes);
  require base_path("views/" . $path);
}

function redirect($path)
{
  header("location: {$path}");
  exit();
}

function login($user, $password): bool
{
  if (password_verify($password, $user["password"])) {
    $_SESSION["user"] = $user;

    session_regenerate_id(true);
    return true;
  }

  return false;
}

function logout(): void
{
  session_destroy();

  $sessionParams = session_get_cookie_params();
  setcookie(
    "PHPSESSID",
    "",
    time() - 3600,
    $sessionParams["path"],
    $sessionParams["domain"],
    $sessionParams["secure"],
    $sessionParams["httponly"]
  );
}
