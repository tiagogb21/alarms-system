<form method="post" action="/login" class="p-2 form-signin d-flex flex-column gap-3">
  <?php
  $validations = flash()->get('validations');
  ?>
  <h1 class="fs-2 fw-bold text-center">Login</h1>
  <div class="form-group">
    <label for="email" class="mb-2">Email:</label>
    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"
      placeholder="Enter email">
  </div>
  <?php if (isset($validations['email'])) { ?>
    <div class="label text-xs text-danger"><?= $validations['email'][0] ?></div>
  <?php } ?>
  <div class="form-group">
    <label for="password" class="mb-2">Password:</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
  </div>
  <?php if (isset($validations['password'])) { ?>
    <div class="label text-xs text-danger"><?= $validations['password'][0] ?></div>
  <?php } ?>
  <button type="submit" class="btn btn-lg btn-primary btn-block mt-2">Entrar</button>
  <a href="/register" class="btn btn-link">Ainda não possui uma conta?</a>
</form>