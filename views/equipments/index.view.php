<div class="container mt-3">
  <div class="row">
    <div class="col-md-3">
      <h2 class="mb-3">Equipamentos</h2>
      <ul class="list-group">
        <?php if (!empty($equipments)): ?>
          <?php foreach ($equipments as $equipment): ?>
            <li class="list-group-item">
              <a href="?equipment_id=<?= $equipment->equipment_id ?>" class="text-decoration-none">
                <?= htmlspecialchars($equipment->name) ?>
              </a>
            </li>
          <?php endforeach; ?>
        <?php else: ?>
          <li class="list-group-item text-muted">Nenhum equipamento cadastrado.</li>
        <?php endif; ?>
      </ul>
    </div>

    <div class="col-md-9">
      <?php if (!empty($selectedEquipment)): ?>
        <h2 class="fs-3 mb-3 fw-bold">Detalhes do Equipamento</h2>
        <div class="card p-3 d-flex flex-column gap-3">
          <h4 class="fs-4 fw-bold"><?= htmlspecialchars($selectedEquipment->name) ?></h4>
          <p><strong>Número de Série:</strong> <?= htmlspecialchars($selectedEquipment->serial_number) ?></p>
          <p><strong>Tipo:</strong> <?= htmlspecialchars($selectedEquipment->type) ?></p>
          <p><strong>Data de Registro:</strong> <?= htmlspecialchars($selectedEquipment->registration_date) ?></p>

          <div class="d-flex justify-content-end align-items-center gap-3">
            <button class="btn btn-primary" type="submit" form="form-atualizacao">Atualizar</button>
            <form action="/equipments" method="post">
              <input type="hidden" name="__method" value="DELETE" />
              <input type="hidden" name="equipment_id" value="<?= $selectedEquipment->equipment_id ?>" />
              <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
          </div>
        </div>
      <?php else: ?>
        <p class="text-muted">Selecione um equipamento para ver os detalhes.</p>
      <?php endif; ?>
    </div>
  </div>
</div>