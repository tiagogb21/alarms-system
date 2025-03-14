<?php

$id = $_REQUEST['id'];

function alarms($db, ?int $id = null)
{
  $query = $db->connection()->query("SELECT * FROM alarms");
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

$db = new DB;

$alarm = alarms($alarm, $id);

view('index', compact('alarms'));
view('register');
