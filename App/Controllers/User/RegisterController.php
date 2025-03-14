<?php

namespace App\User\Controllers;

use Core\Database;
use Core\Validation;

class RegisterController
{
  public function index()
  {
    return view('registrar', template: 'guest');
  }

  public function Register()
  {
    $validation = Validation::validate([
      'name' => ['required'],
      'email' => ['required', 'email', 'confirmed', 'unique:users'],
      'password' => ['required', 'min:8', 'max:30', 'strong'],
    ], $_POST);

    if ($validation->notPass()) {
      return view('registrar', template: 'guest');
    }

    $database = new Database(config('database'));

    $database->query(
      query: 'insert into users ( name, email, password ) values ( :name, :email, :password )',
      params: [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
      ]
    );

    flash()->push('mensage', 'Registrado com sucesso!');
    redirect('/login');
  }
}