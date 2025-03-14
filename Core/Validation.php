<?php

namespace Core;

use App\Models\User;

class Validation
{
  public array $validations = [];

  public static function validate(array $rules, array $data): Validation
  {
    $validaton = new self();

    foreach ($rules as $field => $fieldRules) {
      foreach ($fieldRules as $rule) {
        $fieldValue = $dados[$field] ?? '';

        if ($regra == 'confirmed') {
          $validaton->$regra($field, $fieldValue, $data["{$field}_confirmation"] ?? '');
        } elseif (str_contains($regra, ':')) {
          $temp = explode(':', $regra);
          $tempRule = $temp[0];
          $argTemp = $temp[1];
          $validaton->$tempRule($argTemp, $field, $fieldValue);
        } else {
          $validaton->$regra($field, $fieldValue);
        }
      }
    }

    return $validaton;
  }

  /** @noinspection PhpUnusedPrivateMethodInspection
   * Função dinâmica para validar campos obrigatórios
   */
  private function required(string $field, mixed $fieldValue): void
  {
    if (strlen($fieldValue) == 0) {
      $this->addError($field, "O campo $field é obrigatório.");
    }
  }

  /** @noinspection PhpUnusedPrivateMethodInspection
   * Função dinâmica para validar campos de email
   */
  private function email(string $field, mixed $fieldValue): void
  {
    if (!filter_var($fieldValue, FILTER_VALIDATE_EMAIL)) {
      $this->addError($field, "O campo $field é inválido.");
    }
  }

  /** @noinspection PhpUnusedPrivateMethodInspection
   * Função dinâmica para validar campos de confirmação
   */
  private function confirmed(string $field, mixed $fieldValue, mixed $valueFieldConfirmation): void
  {
    if ($fieldValue != $valueFieldConfirmation) {
      $this->addError($field, "Os campos $field e  $field confirmação não conferem.");
    }
  }

  /** @noinspection PhpUnusedPrivateMethodInspection
   * Função dinâmica para validar tamanho mínimo de campos
   */
  private function min(int $min, string $field, mixed $fieldValue): void
  {
    if (strlen($fieldValue) < $min) {
      $this->addError($field, "O campo $field deve ter no mínimo $min caracteres.");
    }
  }

  /** @noinspection PhpUnusedPrivateMethodInspection
   * Função dinâmica para validar tamanho máximo de campos
   */
  private function max(int $max, string $field, mixed $fieldValue): void
  {
    if (strlen($fieldValue) > $max) {
      $this->addError($field, "O campo $field deve ter no máximo $max caracteres.");
    }
  }

  /** @noinspection PhpUnusedPrivateMethodInspection
   * Função dinâmica para validar campos fortes
   */
  private function strong(string $field, mixed $fieldValue): void
  {
    if (!strpbrk($fieldValue, '!@#$%&*')) {
      $this->addError($field, "O campo $field deve conter pelo menos um caractere especial.");
    }
  }

  /** @noinspection PhpUnusedPrivateMethodInspection
   * Função dinâmica para validar campos únicos
   */
  private function unique(string $tabela, string $field, $fieldValue): void
  {
    if (strlen($fieldValue) == 0) {
      return;
    }

    $db = new Database(config('database'));

    $resultado = $db->query(
      "SELECT * FROM $tabela WHERE $field = :valor",
      User::class,
      params: ['valor' => $fieldValue]
    )->fetch();

    if ($resultado) {
      $this->addError($field, "O $field já está sendo usado.");
    }
  }

  private function addError($field, $erro): void
  {
    $this->validations[$field][] = $erro;
  }

  public function notPass(?string $nameCustom = null): bool
  {
    $key = $nameCustom ? "validacoes_" . $nameCustom : 'validacoes';

    flash()->push($key, $this->validations);

    return sizeof($this->validations) > 0;
  }
}