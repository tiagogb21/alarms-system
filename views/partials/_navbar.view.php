<div class="navbar w-100 bg-dark text-white mb-4">
  <div class="container d-flex justify-between">
    <div class="flex-1">
      <a href="/equipments" class="fw-bold text-white fs-4">AlarmsSystem</a>
    </div>
    <div class="flex-none">
      <ul class="menu menu-horizontal px-1">
        <li>
          <details>
            <summary><?= auth()?->name ?></summary>
            <ul class="bg-base-100 rounded-t-none p-2">
              <li><a href="/logout">Sair</a></li>
            </ul>
          </details>
        </li>
      </ul>
    </div>
  </div>
</div>