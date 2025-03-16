<?php

namespace App\Controllers\Email;

use App\Entities\Email;
use App\Interfaces\EmailServiceInterface;

class EmailController
{
  private EmailServiceInterface $emailService;

  public function __construct(EmailServiceInterface $emailService)
  {
    $this->emailService = $emailService;
  }

  public function sendEmail(Email $email): bool
  {
    return $this->emailService->send($email);
  }
}