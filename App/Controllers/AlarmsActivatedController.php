<?php

function alarmsActivated($db, ?int $id = null)
{
  $sql = "SELECT * FROM alarms_activated";

  if (!is_null($id)) {
    $sql .= " where id = {$id}";
  }

  $query = $db->connection()->query($sql);
  $items = $query->fetchAll();
  $store = [];

  foreach ($items as $item) {
    $alarm = new Alarms;
    $alarm->id = $item['id'];
    $alarm->description = $item['description'];
    $alarm->equipment_id = $item['equipment_id'];
    $alarm->registration_date = $item['registration_date'];

    $store[] = $alarm;
  }

  return $store;
}

$alarms = alarmsActivated(new DB, $id);

view('index', compact('alarmsActivated'));
view('register');
