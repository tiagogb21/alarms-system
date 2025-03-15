<div class="bg-base-300 rounded-l-box w-56">
  <div class="bg-base-200 p-4 rounded-tl-box">
    Novo equipamento
  </div>
</div>

<div class="bg-base-200 rounded-r-box w-full p-10">
  <form action="/alarms/create" method="POST" class="d-flex flex-column gap-3">
    <?php
    $validations = flash()->get('validations');
    ?>

    <div class="form-control w-full d-flex flex-column gap-3">
      <div>
        <div class="label">
          <label for="alarm_description" class="label-text">Descrição:</label>
        </div>
        <testearea id="alarm_description" name="description" class="input input-bordered w-full"
          value="<?= old('description') ?>" required />
        <?php if (isset($validations['description'])): ?>
          <div class="label text-danger text-xs"><?= $validations['description'][0] ?></div>
        <?php endif; ?>
      </div>

      <div>
        <div class="label">
          <label for="alarm_serial_number" class="label-text">Número de série</label>
        </div>
        <input type="text" id="alarm_serial_number" name="serial_number" pattern="[A-Za-z0-9\-]+"
          class="input input-bordered w-full" value="<?= old('serial_number') ?>" required />
        <?php if (isset($validations['serial_number'])): ?>
          <div class="label text-danger text-xs"><?= $validations['serial_number'][0] ?></div>
        <?php endif; ?>
      </div>

      <div class="form-floating">
        <select name="type" id="alarm-type" class="form-select" aria-label="alarm type" required>
          <option value="Tensão">Tensão</option>
          <option value="Corrente">Corrente</option>
          <option value="Óleo">Óleo</option>
        </select>
        <label for="floatingSelect">Tipo do Equipamento</label>
      </div>

      <div class="d-flex justify-content-end align-items-center">
        <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
    </div>
  </form>
</div>