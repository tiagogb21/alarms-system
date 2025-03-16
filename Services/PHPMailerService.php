<?php

namespace Services;

use App\Entities\Email;
use App\Interfaces\EmailServiceInterface;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PHPMailerService implements EmailServiceInterface
{
  private PHPMailer $mailer;

  public function __construct()
  {
    $this->mailer = new PHPMailer(true);

    $this->mailer->isSMTP();
    $this->mailer->Host = 'smtp.alarmssystem.com';
    $this->mailer->SMTPAuth = true;
    $this->mailer->Username = 'seu@email.com';
    $this->mailer->Password = 'suasenha';
    $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $this->mailer->Port = 587;
    $this->mailer->isHTML(true);
  }

  public function send(Email $email): bool
  {
    try {
      $this->mailer->setFrom($email->getFrom());
      $this->mailer->addAddress($email->getTo());
      $this->mailer->Subject = $email->getSubject();
      $this->mailer->Body = $email->getBody();

      return $this->mailer->send();
    } catch (Exception $e) {
      error_log("Erro ao enviar e-mail: " . $e->getMessage());
      return false;
    }
  }
}
