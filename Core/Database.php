<?php

namespace Core;

use PDO;
use PDOStatement;

class Database
{
  private PDO $db;

  public function __construct(array $config)
  {
    $connectionString = "{$config['driver']}:host={$config['host']};dbname={$config['dbname']};charset=utf8mb4";
    $this->db = new PDO($connectionString, $config['dbuser'], $config['dbpass'], [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
  }

  public function query(string $query, mixed $class = null, array $params = []): false|PDOStatement
  {
    $prepare = $this->db->prepare($query);

    if ($class) {
      $prepare->setFetchMode(PDO::FETCH_CLASS, $class);
    }

    $prepare->execute($params);

    return $prepare;

  }
}
