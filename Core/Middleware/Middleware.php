<?php

namespace Core\Middleware;

class Middleware
{
  public const MIDDLEWARES = [
    "guest" => Guest::class,
    "admin" => Admin::class,
  ];

  public static function resolve($key): void
  {
    if (!$key) {
      return;
    }

    $middleware = static::MIDDLEWARES[$key] ?? false;

    if (!$middleware) {
      throw new \Exception("No matching middleware found for key: {$key}");
    }

    (new $middleware())->handle();
  }
}
