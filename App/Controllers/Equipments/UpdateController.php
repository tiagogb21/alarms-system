<?php

namespace App\Controllers\Equipments;

use App\Models\Equipment;
use Core\Validation;

class UpdateController
{
  public function __invoke()
  {

    $validation = Validation::validate(
      array_merge([
        'equipment_id' => ['required'],
        'name' => ['required', 'min:5', 'max:255'],
        'serial_number' => ['required'],
        'type' => ['required'],
      ], session()->get('show') ? ['equipments' => ['required']] : []),
      request()->all()
    );

    // if ($validation->notPass()) {
    // return redirect('/equipments?equipment_id=' . request()->post('equipment_id'));
    // }

    Equipment::update(
      request()->post('name'),
      request()->post('serial_number'),
      request()->post('type'),
    );

    flash()->push('mensage', 'Registro atualizado com sucesso!');
    redirect('/equipments');
  }
}