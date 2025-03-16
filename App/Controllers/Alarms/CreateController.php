<?php

namespace App\Controllers\Alarms;

use App\Controllers\Email\EmailController;
use App\Entities\Email;
use App\Models\Alarm;
use Core\Validation;
use Services\PHPMailerService;

class CreateController
{
  public function index()
  {
    return view('alarms/create');
  }

  /** @noinspection PhpVoidFunctionResultUsedInspection */
  public function store()
  {

    $email = new Email(
      "alarmssystem@email.com",
      "abcd@abc.com",
      "Novo alarme urgente",
      "Um novo alarme urgente foi inserido no sistema."
    );

    $emailService = new PHPMailerService();
    $emailController = new EmailController($emailService);

    $validation = Validation::validate([
      'description' => ['required', 'min:3', 'max:255'],
      'classification' => ['required', 'min:3', 'max:10'],
    ], $_POST);

    // if ($validation->notPass()) {
    // return view('alarms/create');
    // }

    if (request()->post('classification') == 'Urgente') {
      $emailController->sendEmail($email);
    }

    Alarm::create([
      'description' => request()->post('description'),
      'classification' => request()->post('classification'),
      'equipment_id' => request()->post('equipment_id'),
      'registration_date' => date('Y-m-d H:i:s'),
    ]);

    flash()->push('mensagem', 'Alarme inserido com sucesso!');

    return redirect('/equipments');
  }

}