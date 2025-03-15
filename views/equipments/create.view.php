<div class="bg-base-300 rounded-l-box w-56">
  <div class="bg-base-200 p-4 rounded-tl-box">
    Novo equipamento
  </div>
</div>

<div class="bg-base-200 rounded-r-box w-full p-10">
  <form action="/equipments/create" method="POST" class="d-flex flex-column gap-3">
    <?php
    $validations = flash()->get('validations');
    ?>

    <div class="form-control w-full d-flex flex-column gap-3">
      <div>
        <div class="label">
          <label for="equipment_name" class="label-text">Nome</label>
        </div>
        <input type="text" id="equipment_name" name="name" class="input input-bordered w-full"
          value="<?= old('name') ?>" required />
        <?php if (isset($validations['name'])): ?>
          <div class="label text-danger text-xs"><?= $validations['name'][0] ?></div>
        <?php endif; ?>
      </div>

      <div>
        <div class="label">
          <label for="equipment_serial_number" class="label-text">Número de série</label>
        </div>
        <input type="text" id="equipment_serial_number" name="serial_number" pattern="[A-Za-z0-9\-]+"
          class="input input-bordered w-full" value="<?= old('serial_number') ?>" required />
        <?php if (isset($validations['serial_number'])): ?>
          <div class="label text-danger text-xs"><?= $validations['serial_number'][0] ?></div>
        <?php endif; ?>
      </div>

      <div class="form-floating">
        <select name="type" id="equipment-type" class="form-select" aria-label="equipment type" required>
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