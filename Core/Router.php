<?php

namespace Core;

use Core\Middleware\Middleware;

class Router
{
  public array $routes = [];

  public function add($method, $uri, $controller): static
  {
    $this->routes[] = [
      "uri" => $uri,
      "controller" => $controller,
      "method" => $method,
      "middleware" => null
    ];

    return $this;
  }

  public function get($uri, $controller)
  {
    return $this->add("GET", $uri, $controller);
  }

  public function post($uri, $controller)
  {
    return $this->add("POST", $uri, $controller);
  }

  public function delete($uri, $controller)
  {
    return $this->add("DELETE", $uri, $controller);
  }

  public function put($uri, $controller): static
  {
    return $this->add("PUT", $uri, $controller);
  }

  public function patch($uri, $controller): static
  {
    return $this->add("PATCH", $uri, $controller);
  }

  public function only($key): static
  {
    $this->routes[array_key_last($this->routes)]["middleware"] = $key;

    return $this;
  }

  public function route($path, $method)
  {
    foreach ($this->routes as $route) {
      if ($route["uri"] === $path && $route["method"] === strtoupper($method)) {
        Middleware::resolve($route["middleware"]);

        return require base_path($route["controller"]);
      }
    }

    abort();
  }
}
