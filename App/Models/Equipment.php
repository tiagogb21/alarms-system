<?php

namespace App\Models;

use Core\Database;

class Equipment
{
  public $id;
  public $name;
  public $serial_number;
  public $type;
  public $registration_date;

  public static function all(?string $search = null): array
  {
    $database = new Database(config('database'));
    return $database->query(
      'SELECT * FROM equipments WHERE equipment_id = :equipment_id' . (
        $search ? ' AND titulo LIKE :pesquisar' : null
      ),
      self::class,
      params: array_merge(
        ['user_id' => auth()->id],
        $search ? ['search' => "%$search%"] : []
      )
    )->fetchAll();
  }

  public static function delete(int $id): void
  {
    $database = new Database(config('database'));

    $database->query(
      'DELETE FROM equipments WHERE id = :id',
      params: [
        'id' => $id
      ]
    );
  }

  public static function update(int $id, string $name, int $serial_number, string $type): void
  {
    $database = new Database(config('database'));

    $set = 'name = :name, serial_number = :serial_number, type = :type';

    if (session()->get('active')) {
      $set .= ', active = true';
    }

    $database->query(
      "UPDATE notas SET $set WHERE id = :id",
      params: array_merge([
        'id' => $id,
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
      'INSERT INTO equipments (usuario_id, titulo, nota, data_criacao, data_atualizacao) 
                  VALUES (:usuario_id, :titulo, :nota, :data_criacao, :data_atualizacao)',
      params: array_merge($data, [
        'data_criacao' => date('Y-m-d H:i:s'),
        'data_atualizacao' => date('Y-m-d H:i:s')
      ])
    );

  }
}