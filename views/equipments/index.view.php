<div class="container mt-3">
  <div class="row">
    <div class="col-md-3">
      <h2 class="fs-3 fw-bold mb-3">Equipamentos</h2>
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
          <li class="list-group-item text-muted">Nenhum equipamento pode ser encontrado.</li>
        <?php endif; ?>
      </ul>
    </div>

    <div class="col-md-9">
      <?php if (!empty($selectedEquipment)): ?>
        <h2 class="fs-3 mb-3 fw-bold">Detalhes do Equipamento</h2>
        <div class="card p-3 d-flex flex-column gap-3">
          <h4 class="fs-4 fw-bold"><?= htmlspecialchars($selectedEquipment->name) ?></h4>
          <div class="d-flex justify-content-end">
            <a href="<?= getBaseURL() ?>alarms/create?equipment_id=<?= $selectedEquipment->equipment_id ?>"
              class="btn btn-success">Adicionar Alarme</a>
          </div>
          <p><strong>Número de Série:</strong> <?= htmlspecialchars($selectedEquipment->serial_number) ?></p>
          <p><strong>Tipo:</strong> <?= htmlspecialchars($selectedEquipment->type) ?></p>
          <p><strong>Data de Registro:</strong>
            <?= htmlspecialchars(DateTime::createFromFormat('Y-m-d H:i:s', $selectedEquipment->registration_date)->format('d/m/Y')) ?>
          </p>

          <ul class="d-flex gap-3 flex-wrap">
            <?php foreach ($alarms as $alarm): ?>
              <?php
              $colorClass = match ($alarm->classification) {
                'urgente' => 'text-danger',
                'emergente' => 'text-warning',
                'ordinario' => 'text-primary',
                default => 'text-secondary'
              };
              ?>
              <li
                class="col-8 col-md-4 d-flex flex-column align-items-center gap-2 border border-1 border-secondary pb-3 rounded">
                <div class="w-100 d-flex justify-content-between align-items-center gap-3">
                  <button type="button" class="btn text-primary" data-bs-toggle="tooltip" title="Atualizar">
                    <i class="bi bi-arrow-clockwise"></i>
                  </button>
                  <button type="button" class="btn text-danger" data-bs-toggle="tooltip" title="Excluir">
                    <i class="bi bi-x fs-3"></i>
                  </button>
                </div>
                <i class="bi bi-lightbulb-fill fs-3 <?= $colorClass ?>"></i>
                <div class="d-flex gap-1">
                  <button type="button" class="btn btn-primary border border-1 border-secondary rounded p-2">on</button>
                  <button type="button" class="btn btn-danger border border-1 border-secondary rounded p-2">off</button>
                </div>
              </li>
            <?php endforeach; ?>
          </ul>

          <div class="d-flex justify-content-end align-items-center gap-3">
            <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Editar Equipamento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="/equipments" method="post" id="form-update">
                      <input type="hidden" name="__method" value="PUT" />
                      <input type="hidden" name="equipment_id" value="<?= $selectedEquipment->equipment_id ?>" />

                      <div class="mb-3">
                        <label for="equipment-name" class="form-label">Nome</label>
                        <input type="text" id="equipment-name" name="name" value="<?= $selectedEquipment->name ?>"
                          class="form-control" />
                      </div>

                      <div class="mb-3">
                        <label for="equipment-serial-number" class="form-label">Número de Série</label>
                        <input type="text" id="equipment-serial-number" name="serial_number"
                          value="<?= $selectedEquipment->serial_number ?>" class="form-control" />
                      </div>

                      <div class="mb-3">
                        <label for="equipment-type" class="form-label">Tipo do Equipamento</label>
                        <select name="type" id="equipment-type" class="form-select" required>
                          <option value="Tensão">Tensão</option>
                          <option value="Corrente">Corrente</option>
                          <option value="Óleo">Óleo</option>
                        </select>
                      </div>

                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Salvar alterações</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal">
              Atualizar
            </button>
            <form action="/equipments" method="POST">
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