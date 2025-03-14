<?php

return [
  'database' => [
    'driver' => 'mysql',
    'host' => 'localhost',
    'dbname' => 'alarms',
    'dbuser' => 'docker',
    'dbpass' => 'docker',
  ],
  'security' => [
    'first_key' => env('ENCRYPT_FIRST_KEY', 'first_key'),
    'second_key' => env('ENCRYPT_SECOND_KEY', 'second_key')
  ]
];