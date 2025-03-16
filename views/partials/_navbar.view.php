<div class="navbar w-100 bg-dark text-white mb-4">
  <div class="container d-flex justify-between">
    <div class="flex-1">
      <a href="/equipments" class="fw-bold text-white fs-4">AlarmsSystem</a>
    </div>
    <div class="flex-none">
      <ul class="menu menu-horizontal px-1">
        <li>
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
              data-bs-toggle="dropdown" aria-expanded="false">
              <?= auth()?->name ?>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="/logout">Sair</a>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>