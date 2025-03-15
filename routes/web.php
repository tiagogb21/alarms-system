<?php

use App\Controllers\IndexController;

use App\Controllers\User\LoginController;
use App\Controllers\User\LogoutController;
use App\Controllers\User\RegisterController;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\GuestMiddleware;
use Core\Route;
use App\Controllers\Equipments;

(new Route)
  // Não autenticado
  ->get('/', IndexController::class, GuestMiddleware::class)
  ->get('/login', [LoginController::class, 'index'], GuestMiddleware::class)
  ->post('/login', [LoginController::class, 'login'], GuestMiddleware::class)
  ->get('/register', [RegisterController::class, 'index'], GuestMiddleware::class)
  ->post('/register', [RegisterController::class, 'register'], GuestMiddleware::class)

  // Autenticado
  ->get('/logout', LogoutController::class, AuthMiddleware::class)
  ->get('/equipments', Equipments\IndexController::class, AuthMiddleware::class)
  ->get('/equipments/create', [Equipments\CreateController::class, 'index'], AuthMiddleware::class)
  ->post('/equipments/create', [Equipments\CreateController::class, 'store'], AuthMiddleware::class)
  ->put('/equipments', Equipments\UpdateController::class, AuthMiddleware::class)
  ->delete('/equipments', Equipments\DeleteController::class, AuthMiddleware::class)

  ->get('/confirmar', [Equipments\ViewController::class, 'confirm'], AuthMiddleware::class)
  ->post('/mostrar', [Equipments\ViewController::class, 'show'], AuthMiddleware::class)
  ->get('/esconder', [Equipments\ViewController::class, 'hide'], AuthMiddleware::class)

  ->run();