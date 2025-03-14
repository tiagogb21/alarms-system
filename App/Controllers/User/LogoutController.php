<?php

namespace App\User\Controllers;

class LogoutController
{
  public function __invoke()
  {

    session_destroy();

    redirect('/login');
  }
}