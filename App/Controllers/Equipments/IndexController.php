<?php

namespace App\Controllers\Equipments;

use App\Models\Equipment;

class IndexController
{
  public function __invoke()
  {
    var_dump(__LINE__);
    $equipments = Equipment::all(request()->get('search'));

    if (!$selectedEquipment = $this->getSelectedEquipment($equipments)) {
      return view('equipments/not-found');
    }

    return view('equipments/index', compact('equipments', 'selectedEquipment'));
  }

  private function getSelectedEquipment(array $equipments)
  {
    $id = request()->get('id', (sizeof($equipments) > 0 ? $equipments[0]->id : null));

    $filtro = array_filter($equipments, fn($n) => $n->id == $id);
    return array_pop($filtro);
  }
}