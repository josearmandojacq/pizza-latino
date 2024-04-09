<?php

$router->get("", "controllers/home.php");
$router->get("/", "controllers/home.php");

$router->get("/about", "controllers/about.php");

$router->get("/menu", "controllers/menu.php");

$router->get("/pizza", "controllers/pizzas/show.php");
$router->get("/pizza/new", "controllers/pizzas/create.php")->only("admin");
$router->post("/pizza", "controllers/pizzas/store.php")->only("admin");
$router->get("/pizza/edit", "controllers/pizzas/edit.php")->only("admin");
$router->post("/pizza/update", "controllers/pizzas/update.php")->only("admin");
$router->get("/pizza/delete", "controllers/pizzas/destroy.php")->only("admin");
$router->post("/pizza/pay", "controllers/pizzas/pay.php");

$router->get("/login", "controllers/sessions/create.php")->only("guest");
$router->post("/login", "controllers/sessions/store.php")->only("guest");
$router->get("/logout", "controllers/sessions/destroy.php");

$router->get("/register", "controllers/registration/create.php")->only("guest");
$router->post("/register", "controllers/registration/store.php")->only("guest");

$router->post("/orders", "controllers/order.php");

$router->post("/generate_invoice", "services/generate_invoice.php");

$router->get("/users/edit", "controllers/users/edit.php");
$router->post("/users/update", "controllers/users/update.php");
