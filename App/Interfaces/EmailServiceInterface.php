<?php

namespace App\Interfaces;

use App\Entities\Email;

interface EmailServiceInterface
{
  public function send(Email $email): bool;
}