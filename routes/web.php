<?php

use App\Controllers\IndexController;

use App\Controllers\User\LoginController;
use App\Controllers\User\LogoutController;
use App\Controllers\User\RegisterController;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\GuestMiddleware;
use Core\Route;
use App\Controllers\Equipments;
use App\Controllers\Alarms;

(new Route)
  // Não autenticado
  ->get('/', Equipments\IndexController::class, AuthMiddleware::class)
  ->get('/login', [LoginController::class, 'index'], GuestMiddleware::class)
  ->post('/login', [LoginController::class, 'login'], GuestMiddleware::class)
  ->get('/register', [RegisterController::class, 'index'], GuestMiddleware::class)
  ->post('/register', [RegisterController::class, 'register'], GuestMiddleware::class)

  // Autenticado

  // Equipamentos
  ->get('/logout', LogoutController::class, AuthMiddleware::class)
  ->get('/equipments', Equipments\IndexController::class, AuthMiddleware::class)
  ->get('/equipments/create', [Equipments\CreateController::class, 'index'], AuthMiddleware::class)
  ->post('/equipments/create', [Equipments\CreateController::class, 'store'], AuthMiddleware::class)
  ->put('/equipments', Equipments\UpdateController::class, AuthMiddleware::class)
  ->delete('/equipments', Equipments\DeleteController::class, AuthMiddleware::class)

  ->get('/confirmar', [Equipments\ViewController::class, 'confirm'], AuthMiddleware::class)

  // Alarmes
  ->get('/alarms/create', [Alarms\CreateController::class, 'index'], AuthMiddleware::class)
  ->post('/alarms/create', [Alarms\CreateController::class, 'store'], AuthMiddleware::class)

  ->run();