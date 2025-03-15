<h1>Lista de Equipamentos</h1>

<?php if (sizeof($equipments) > 0): ?>
  <ul>
    <?php foreach ($equipments as $equipment): ?>
      <li><?= htmlspecialchars($equipment->name) ?></li>
    <?php endforeach; ?>
  </ul>

  <?php if ($selectedEquipment): ?>
    <h2>Equipamento Selecionado: <?= htmlspecialchars($selectedEquipment->name) ?></h2>
  <?php endif; ?>

<?php else: ?>
  <p><strong>Ainda não há equipamentos cadastrados.</strong></p>
<?php endif; ?>