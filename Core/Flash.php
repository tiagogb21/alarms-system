<?php

namespace Core;

class Flash
{

  public function push(string $key, mixed $value): void
  {
    $_SESSION["flash_$key"] = $value;
  }

  public function get(string $key): mixed
  {
    if (!isset($_SESSION["flash_$key"])) {
      return false;
    }

    $value = $_SESSION["flash_$key"];

    unset($_SESSION["flash_$key"]);

    return $value;
  }

}