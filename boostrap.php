<?php

use Core\{Container, Database, App};

$container = new Container();

$container->add("Core\Database", function () {
  $config = require base_path("config.php");

  return new Database($config["database"]);
});

App::setContainer($container);
