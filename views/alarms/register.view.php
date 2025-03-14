<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $description = $_POST['description'] ?? '';
  $classification = $_POST['classification'] ?? '';
  $equipament_id = $_POST['equipament_id'] ?? '';

  $stmt = $pdo->prepare("INSERT INTO alarmes (description, classification, equipament_id) VALUES (?, ?, ?)");
  if ($stmt->execute([$description, $classification, $equipament_id])) {
    echo "Alarm registered successfully!";
  } else {
    echo "Error registering alarm.";
  }
}

$equipaments = $pdo->query("SELECT id, name FROM equipaments")->fetchAll();
?>
<form method="POST">
  Descrição: <input type="text" name="description" required><br>
  Classificação:
  <select name="classification" required>
    <option value="Urgente">Urgente</option>
    <option value="Emergente">Emergente</option>
    <option value="Ordinário">Ordinário</option>
  </select><br>
  Equipamento Relacionado:
  <select name="equipament_id" required>
    <?php foreach ($equipaments as $equipament): ?>
      <option value="<?= $equipament['id'] ?>"><?= $equipament['name'] ?></option>
    <?php endforeach; ?>
  </select><br>
  <button type="submit">Cadastrar</button>
</form>