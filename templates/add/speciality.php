<?php

require_once "../header-admin.php";

?>

  <form action="" class="form-group container flex-grow-1">
    <h3 class="text-center">Ajouter une spécialité</h3>
    <div class="mb-3">
      <label for="firstname" class="col-form-label">Spécialité: </label>
      <input type="text" class="form-control" id="firstname">
    </div>
    <div class="mb-3">
        <h5>Agent.s concerné.s: </h5>
        <!-- faire une boucle -->
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
            Nom Agent 1
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
          <label class="form-check-label" for="flexCheckChecked">
            Nom Agent 2
          </label>
        </div>
    </div>
    <div class="mb-3">
      <button type="submit" class="btn btn-light">Ajouter</button>
    </div>
  </form>

<?php

require_once "../footer-admin.php";