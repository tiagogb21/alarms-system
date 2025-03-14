<?php

require 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = $_POST['name'] ?? '';
  $serial_number = $_POST['serial_number'] ?? '';
  $type = $_POST['type'] ?? '';

  $stmt = $pdo->prepare("INSERT INTO equipments (name, serial_number, type) VALUES (?, ?, ?)");
  if ($stmt->execute([$name, $serial_number, $type])) {
    echo "Equipment registered successfully!";
  } else {
    echo "Error registering equipment.";
  }
}
?>

<form method="POST">
  Nome: <input type="text" name="name" required>
  Número de Série: <input type="text" name="serial_number" required>
  Tipo:
  <select name="type" required>
    <option value="Tensão">Tensão</option>
    <option value="Corrente">Corrente</option>
    <option value="Óleo">Óleo</option>
  </select><br>
  <button type="submit">Cadastrar</button>
</form>