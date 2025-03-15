<?php

namespace App\Controllers\Equipments;

use App\Models\Equipment;
use Core\Validation;

class CreateController
{
  public function index()
  {
    return view('equipments/create');
  }

  /** @noinspection PhpVoidFunctionResultUsedInspection */
  public function store()
  {
    $validation = Validation::validate([
      'name' => ['required', 'min:3', 'max:255'],
      'serial_number' => ['required', 'min:3', 'max:10'],
      'type' => ['required']
    ], $_POST);

    // if ($validation->notPass()) {
    // return view('equipments/create');
    // }

    Equipment::create([
      'name' => request()->post('name'),
      'serial_number' => request()->post('serial_number'),
      'type' => trim(request()->post('type')),
      'registration_date' => date('Y-m-d H:i:s'),
    ]);

    flash()->push('mensagem', 'Equipamento inserido com sucesso!');

    return redirect('/equipments');
  }

}