<?php

require_once "../header-admin.php";

$specialityController = new SpecialityController();
$specialities = $specialityController->getAll();

$statusController = new StatusController();
$states = $statusController->getAll();

$typeController = new MissionTypeController();
$types = $typeController->getAll();


?>

  <form action="../../form/add/mission-form.php" class="form-group container flex-grow-1" method="post">
    <h3 class="text-center">Ajouter une mission</h3>
    <div class="mb-3">
      <label for="missionTitle" class="col-form-label">Nom de la mission</label>
      <input type="text" class="form-control" id="missionTitle" name="name">
    </div>
    <div class="mb-3">
      <label for="description" class="col-form-label">Description</label>
      <textarea class="form-control" id="description" rows="3" name="description"></textarea>
    </div>
    <div class="mb-3">
      <label for="missionCodeName" class="col-form-label">Nom de code</label>
      <input type="text" class="form-control" id="missionCodeName" name="code_name">
    </div>
    <div class="mb-3">
      <label for="startDate" class="col-form-label">Date de début</label>
      <input type="date" class="form-control" id="startDate" name="start_date">
    </div>
    <div class="mb-3">
      <label for="endDate" class="col-form-label">Date de fin</label>
      <input type="date" class="form-control" id="endDate" name="end_date">
    </div>
    <div class="mb-3">
      <label for="speciality" class="col-form-label">Spécialité requise</label>
      <select class="form-select" aria-label="Default select example" name="speciality">
        <option selected>Sélectionnez une spécialité</option>
        <?php foreach($specialities as $speciality) : ?>
          <option value="<?= $speciality->getId() ?>"><?= $speciality->getName() ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="mb-3">
      <label for="country" class="col-form-label">Lieu</label>
      <input type="text" name="country" id="country" class="form-control">
    </div>
    <div class="mb-3">
      <label for="missionType" class="col-form-label">Type</label>
      <select class="form-select" aria-label="Default select example" name="mission_type_id">
        <option selected>Sélectionnez un type</option>
        <?php foreach($types as $type) : ?>
          <option value="<?= $type->getId() ?>"><?= $type->getName() ?></option>
        <?php endforeach; ?>
      </select>    
    </div>
    <div class="mb-3">
      <input type="submit" class="btn btn-light" value="Ajouter">
    </div>
  </form>

  

<?php

require_once "../footer-admin.php";