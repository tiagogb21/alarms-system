<div class="d-flex gap-2 space-x-4 w-100">
  <form action="<?= getBaseURL() ?>equipments" class="d-flex align-items-center w-75">
    <div class="input-group" class="">
      <input type="search" name="search" placeholder="Pesquisar..." class="form-control"
        value="<?= request()->get('search', '') ?>" aria-label="Recipient's name" aria-describedby="input-name" />
      <i class="fas fa-search"></i>
    </div>
  </form>
  <a href="<?= getBaseURL() ?>equipments/create" class="btn btn-primary">+ adicionar</a>
</div>