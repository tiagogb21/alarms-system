<?php

namespace App\User\Controllers;

use App\Models\User;
use App\Models\Usuario;
use Core\Database;
use Core\Validation;

class LoginController
{
  public function index()
  {
    return view('login', template: 'guest');
  }

  public function Login()
  {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $validacao = Validation::validate([
      'email' => ['required', 'email'],
      'senha' => ['required'],
    ], $_POST);

    if ($validacao->notPass()) {
      return view('login', template: 'guest');
    }

    $database = new Database(config('database'));

    $users = $database->query(
      query: 'select * from users where email = :email',
      class: User::class,
      params: compact('email')
    )->fetch();

    if (!($users && password_verify($senha, $users->senha))) {
      flash()->push('validations', ['email' => ['Usuário ou senha estão incorretos!']]);

      return view('login', template: 'guest');
    }

    $_SESSION['auth'] = $users;

    flash()->push('mensage', 'Seja bem vindo ' . $users->nome . '!');

    redirect('/notas');
  }
}