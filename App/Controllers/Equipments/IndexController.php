<?php

namespace App\Controllers\Equipments;

use App\Models\Alarm;
use App\Models\Equipment;

class IndexController
{
  public function __invoke()
  {
    $equipments = Equipment::all(request()->get('search'));

    if (sizeof($equipments) > 0) {
      $selectedEquipment = $this->getSelectedEquipment($equipments);

      if (!$selectedEquipment) {
        return view('404');
      }
    } else {
      $selectedEquipment = null;
    }

    $alarms = Alarm::all($selectedEquipment->equipment_id);

    return view('equipments/index', compact('equipments', ['selectedEquipment', 'alarms']));
  }

  private function getSelectedEquipment(array $equipments)
  {
    $id = request()->get('equipment_id', (sizeof($equipments) > 0 ? $equipments[0]->equipment_id : null));

    $filter = array_filter($equipments, fn($n) => $n->equipment_id == $id);

    return array_pop($filter);
  }
}