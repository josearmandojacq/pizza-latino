<?php

$router->get("", "controllers/home.php");
$router->get("/", "controllers/home.php");

$router->get("/about", "controllers/about.php");

$router->get("/menu", "controllers/menu.php");

$router->get("/pizza", "controllers/pizzas/show.php");

$router->get("/login", "controllers/sessions/create.php")->only("guest");
$router->post("/login", "controllers/sessions/store.php")->only("guest");
$router->get("/logout", "controllers/sessions/destroy.php");

$router->get("/register", "controllers/registration/create.php")->only("guest");
$router->post("/register", "controllers/registration/store.php")->only("guest");

$router->post("/orders", "controllers/order.php");

$router->post("/generate_invoice", "services/generate_invoice.php");
