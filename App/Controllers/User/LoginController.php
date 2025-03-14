<?php

namespace App\Controllers\User;

use App\Models\User;
use Core\Database;
use Core\Validation;

class LoginController
{
  public function index()
  {
    return view('users/login', template: 'guest');
  }

  public function Login()
  {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $validacao = Validation::validate([
      'email' => ['required', 'email'],
      'password' => ['required'],
    ], $_POST);

    // if ($validacao->notPass()) {
    // return view('users/login', template: 'guest');
    // }

    $database = new Database(config('database'));

    $users = $database->query(
      query: 'select * from users where email = :email',
      class: User::class,
      params: compact('email')
    )->fetch();

    if (!($users && password_verify($password, $users->password))) {
      flash()->push('validations', ['email' => ['Usuário ou password estão incorretos!']]);

      return view('login', template: 'guest');
    }

    $_SESSION['auth'] = $users;

    flash()->push('mensage', 'Seja bem vindo ' . $users->name . '!');

    redirect('equipments/index');
  }
}