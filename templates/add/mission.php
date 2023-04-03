<?php

require_once "../header-admin.php";

?>

  <form action="" class="form-group container flex-grow-1">
    <h3 class="text-center">Ajouter une mission</h3>
    <div class="mb-3">
      <label for="missionTitle" class="col-form-label">Nom de la mission</label>
      <input type="text" class="form-control" id="missionTitle">
    </div>
    <div class="mb-3">
      <label for="description" class="col-form-label">Description</label>
      <textarea class="form-control" id="description" rows="3"></textarea>
    </div>
    <div class="mb-3">
      <label for="missionCodeName" class="col-form-label">Nom de code</label>
      <input type="text" class="form-control" id="missionCodeName">
    </div>
    <div class="mb-3">
      <label for="startDate" class="col-form-label">Date de début</label>
      <input type="date" class="form-control" id="startDate">
    </div>
    <div class="mb-3">
      <label for="endDate" class="col-form-label">Date de fin</label>
      <input type="date" class="form-control" id="endDate">
    </div>
    <div class="mb-3">
      <label for="speciality" class="col-form-label">Spécialité requise</label>
      <select class="form-select" aria-label="Default select example">
        <option selected>Sélectionnez une spécialité</option>
        <!-- faire une boucle pour afficher les spécialités -->
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="country" class="col-form-label">Lieu</label>
      <select class="form-select" aria-label="Default select example">
        <option selected>Sélectionnez un lieu</option>
        <!-- faire une boucle -->
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="missionStatus" class="col-form-label">Statut</label>
      <select class="form-select" aria-label="Default select example">
        <option selected>Sélectionnez un statut</option>
        <!-- faire une boucle -->
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="missionType" class="col-form-label">Type</label>
      <select class="form-select" aria-label="Default select example">
        <option selected>Sélectionnez un type</option>
        <!-- faire une boucle -->
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>    
    </div>
    <div class="mb-3">
      <button type="submit" class="btn btn-light">Ajouter</button>
    </div>
  </form>

<?php

require_once "../footer-admin.php";