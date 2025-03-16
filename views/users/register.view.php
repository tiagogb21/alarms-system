<form method="post" action="/register" class="p-2 form-signin d-flex flex-column gap-3">
  <?php
  $validations = flash()->get('validations');
  ?>
  <h1 class="fs-2 fw-bold text-center">Cadastrar</h1>
  <div class="form-group">
    <label for="register-email" class="mb-2">Email:</label>
    <input type="email" name="register-email" class="form-control" id="register-email" aria-describedby="emailHelp"
      placeholder="johndoe@gmail.com" value="<?= old('email') ?>">
    <?php if (isset($validations['email'])) { ?>
      <div class="label fs-6 text-danger"><?= $validations['email'][0] ?></div>
    <?php } ?>
  </div>
  <div class="form-group">
    <label for="register-name" class="mb-2">Nome:</label>
    <input type="text" name="register-name" class="form-control" id="register-name" aria-describedby="nameHelp"
      placeholder="john doe" value="<?= old('name') ?>">
    <?php if (isset($validations['name'])) { ?>
      <div class="label fs-6 text-danger"><?= $validations['name'][0] ?></div>
    <?php } ?>
  </div>
  <div class="form-group">
    <label for="password">Senha:</label>
    <input type="password" name="password" class="form-control" id="register-password" placeholder="******"
      value="<?= old('password') ?>">
    <?php if (isset($validations['password'])) { ?>
      <div class="label fs-6 text-danger"><?= $validations['password'][0] ?></div>
    <?php } ?>
  </div>
  <button type="submit" class="btn btn-lg btn-primary btn-block mt-2">Cadastrar</button>
  <a href="./login" class="btn btn-link">Já possui uma conta?</a>
</form>