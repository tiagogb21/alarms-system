<?php

namespace App\Controllers\User;

class LogoutController
{
  public function __invoke()
  {

    session_destroy();

    redirect('/login');
  }
}