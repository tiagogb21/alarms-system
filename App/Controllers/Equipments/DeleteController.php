<?php

namespace App\Controllers\Equipments;

use App\Models\Equipment;
use Core\Validation;

class DeleteController
{
  public function __invoke()
  {
    $validation = Validation::validate([
      'equipment_id' => ['required'],
    ], request()->all());

    // if ($validation->notPass()) {
    // return redirect('/equipments?equipment_id=' . request()->post('equipment_id'));
    // }

    Equipment::delete(request()->post('equipment_id'));

    flash()->push('message', 'Registro deletado com sucesso!');
    redirect('/equipments');
  }
}