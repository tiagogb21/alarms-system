<?php

namespace App\Entities;

class Email
{
  private string $from;
  private string $to;
  private string $subject;
  private string $body;

  public function __construct(string $from, string $to, string $subject, string $body)
  {
    $this->from = $from;
    $this->to = $to;
    $this->subject = $subject;
    $this->body = $body;
  }

  public function getFrom(): string
  {
    return $this->from;
  }
  public function getTo(): string
  {
    return $this->to;
  }
  public function getSubject(): string
  {
    return $this->subject;
  }
  public function getBody(): string
  {
    return $this->body;
  }
}
