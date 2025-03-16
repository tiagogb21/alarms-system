<div class="bg-base-300 rounded-l-box w-56">
  <div class="fs-3 mb-3 fw-bold">
    Novo alarme
  </div>
</div>

<div class="bg-base-200 rounded-r-box w-full p-10">
  <form action="/alarms/create" method="POST" class="d-flex flex-column gap-3">
    <?php
    $validations = flash()->get('validations');
    ?>

    <div class="form-control w-full d-flex flex-column gap-3 p-3">
      <div class="form-floating">
        <select name="classification" id="alarm-classification" class="form-select" aria-label="alarm classification"
          required>
          <option value="urgente">Urgente</option>
          <option value="emergente">Emergente</option>
          <option value="ordinario">Ordinário</option>
        </select>
        <label for="floatingSelect">Classificação</label>
      </div>
      <div class="form-group">
        <label for="alarm_description">Descrição:</label>
        <textarea class="form-control" id="alarm_description" name="description" rows="3"
          value="<?= old('description') ?>" required></textarea>
        <?php if (isset($validations['description'])): ?>
          <div class="label text-danger text-xs"><?= $validations['description'][0] ?></div>
        <?php endif; ?>
      </div>

      <input type="hidden" name="equipment_id" value="<?= $_GET['equipment_id'] ?? '' ?>">

      <div class="d-flex justify-content-end align-items-center">
        <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
    </div>
  </form>
</div>