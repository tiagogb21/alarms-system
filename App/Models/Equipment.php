<?php

namespace App\Models;

use Core\Database;

class Equipment
{
  public $equipment_id;
  public $name;
  public $serial_number;
  public $type;
  public $registration_date;

  public static function all(?string $search = null): array
  {
    $database = new Database(config('database'));
    return $database->query(
      'SELECT * FROM equipments' . ($search ? ' WHERE name LIKE :search' : ''),
      self::class,
      params: $search ? ['search' => "%$search%"] : []
    )->fetchAll();
  }

  public static function delete(int $id): void
  {
    $database = new Database(config('database'));

    $database->query(
      'DELETE FROM equipments WHERE equipment_id = :id',
      params: [
        'id' => $id
      ]
    );
  }

  public static function update(string $name, int $serial_number, string $type): void
  {
    $database = new Database(config('database'));

    $set = 'name = :name, serial_number = :serial_number, type = :type';

    if (session()->get('active')) {
      $set .= ', active = true';
    }

    $database->query(
      "UPDATE equipments SET $set WHERE equipment_id = :equipment_id",
      params: array_merge([
        'name' => $name,
        'serial_number' => $serial_number,
        'registration_date' => date('Y-m-d H:i:s'),
      ], session()->get('active') ? ['active' => encrypt($name)] : [])
    );

  }

  public static function create(array $data): void
  {
    $database = new Database(config('database'));

    $database->query(
      'INSERT INTO equipments (name, serial_number, type, registration_date) 
                  VALUES (:name, :serial_number, :type, :registration_date)',
      params: array_merge($data, [
        'registration_date' => date('Y-m-d H:i:s')
      ])
    );

  }
}