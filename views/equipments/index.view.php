<div class="container mt-3">
  <div class="row">
    <!-- Menu Lateral -->
    <div class="col-md-3">
      <h2 class="mb-3">Equipamentos</h2>
      <ul class="list-group">
        <?php if (!empty($equipments)): ?>
          <?php foreach ($equipments as $equipment): ?>
            <li class="list-group-item">
              <a href="?id=<?= $equipment->equipment_id ?>" class="text-decoration-none">
                <?= htmlspecialchars($equipment->name) ?>
              </a>
            </li>
          <?php endforeach; ?>
        <?php else: ?>
          <li class="list-group-item text-muted">Nenhum equipamento cadastrado.</li>
        <?php endif; ?>
      </ul>
    </div>

    <!-- Detalhes do Equipamento -->
    <div class="col-md-9">
      <?php if (!empty($selectedEquipment)): ?>
        <h2 class="mb-3">Detalhes do Equipamento</h2>
        <div class="card p-3">
          <h4><?= htmlspecialchars($selectedEquipment->name) ?></h4>
          <p><strong>Número de Série:</strong> <?= htmlspecialchars($selectedEquipment->serial_number) ?></p>
          <p><strong>Tipo:</strong> <?= htmlspecialchars($selectedEquipment->type) ?></p>
          <p><strong>Data de Registro:</strong> <?= htmlspecialchars($selectedEquipment->registration_date) ?></p>

          <!-- Botões -->
          <div class="mt-3">
            <a href="adicionar.php" class="btn btn-success">Atualizar</a>
            <a href="equipments/excluir.php?equipment_id=<?= $selectedEquipment->equipment_id ?>" class="btn btn-danger"
              onclick="return confirm('Tem certeza que deseja excluir este equipamento?')">Excluir</a>
          </div>
        </div>
      <?php else: ?>
        <p class="text-muted">Selecione um equipamento para ver os detalhes.</p>
      <?php endif; ?>
    </div>
  </div>
</div>