<?php

namespace App\Models;

use Core\Database;

class Alarm
{
  public $alarm_id;
  public $description;
  public $classification;
  public $equipment_id;
  public $registration_date;

  public static function all(int $equipment_id): array
  {
    $database = new Database(config('database'));
    return $database->query(
      'SELECT * FROM alarms WHERE equipment_id LIKE :equipment_id',
      self::class,
      params: ['equipment_id' => "%$equipment_id%"],
    )->fetchAll();
  }

  public static function delete(int $id): void
  {
    $database = new Database(config('database'));

    $database->query(
      'DELETE FROM alarms WHERE alarm_id = :id',
      params: [
        'id' => $id
      ]
    );
  }

  public static function update(int $alarm_id, string $name, string $serial_number, string $type): void
  {
    $database = new Database(config('database'));

    $set = 'name = :name, serial_number = :serial_number, type = :type';

    $database->query(
      "UPDATE alarms SET $set WHERE alarm_id = :alarm_id",
      params: array_merge([
        'alarm_id' => $alarm_id,
        'name' => $name,
        'serial_number' => $serial_number,
        'type' => $type,
      ], session()->get('active') ? ['active' => encrypt($name)] : [])
    );
  }

  public static function create(array $data): void
  {
    $database = new Database(config('database'));

    $database->query(
      'INSERT INTO alarms (description, classification, equipment_id, registration_date) 
                  VALUES (:description, :classification, :equipment_id, :registration_date)',
      params: array_merge($data, [
        'registration_date' => date('Y-m-d H:i:s')
      ])
    );
  }
}