<?php

require_once "../header-admin.php";

?>

  <form action="" class="form-group container flex-grow-1">
    <h3 class="text-center">Ajouter une planque</h3>
    <div class="mb-3">
      <label for="firstname" class="col-form-label">Type: </label>
      <input type="text" class="form-control" id="firstname">
    </div>
    <div class="mb-3">
      <label for="lastname" class="col-form-label">Adresse:  </label>
      <input type="text" class="form-control" id="lastname">
    </div>
    <div class="mb-3">
      <label for="country" class="col-form-label">Lieu: </label>
      <select class="form-select" aria-label="Default select example">
        <option selected>Sélectionnez un lieu</option>
        <!-- faire une boucle -->
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
    </div>
    <div class="mb-3">
        <h5>Missions: </h5>
        <!-- faire une boucle -->
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
            Titre Mission 1
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
          <label class="form-check-label" for="flexCheckChecked">
            Titre Mission 2
          </label>
        </div>
    </div>
    <div class="mb-3">
      <button type="submit" class="btn btn-light">Ajouter</button>
    </div>
  </form>

<?php

require_once "../footer-admin.php";