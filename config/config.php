<?php

return [
  'database' => [
    'driver' => 'mysql',
    'database' => base_path('database/alarms.mysql')
  ],
  'security' => [
    'first_key' => env('ENCRYPT_FIRST_KEY', 'first_key'),
    'second_key' => env('ENCRYPT_SECOND_KEY', 'second_key')
  ]
];