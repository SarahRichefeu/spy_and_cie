<?php

require_once "../header-admin.php";

$missionController = new MissionController();
$mission = $missionController->get($_GET['id']);

$specialityController = new SpecialityController();
$specialities = $specialityController->getAll();

$statusController = new StatusController();
$states = $statusController->getAll();
$status = $statusController->get($mission->getMission_status_id());

$typeController = new MissionTypeController();
$types = $typeController->getAll();
$type = $typeController->get($mission->getMission_type_id());


?>

   <form action="../../form/delete/mission.php" class=" delete d-flex justify-content-end">
        <input type="submit" class="btn btn-danger" value="Supprimer">
   </form> 

  <form action="../../form/update/mission-form.php" class="form-group container flex-grow-1" method="post">
    <h3 class="text-center">Modifier une mission</h3>
    <div class="mb-3">
      <label for="id" class="col-form-label">Numéro de la mission: </label>
      <input type="text" class="form-control" id="id" name="id" value="<?= $mission->getId()?>" readonly>
      <small id="emailHelp" class="form-text text-muted">L'identifiant doit rester unique, vous ne pouvez pas le changer.</small>
    </div>
    </div>
    <div class="mb-3">
      <label for="missionTitle" class="col-form-label">Titre de la mission: </label>
      <input type="text" class="form-control" id="missionTitle" name="name" value="<?= $mission->getName()?>">
    </div>
    <div class="mb-3">
      <label for="description" class="col-form-label">Description</label>
      <textarea class="form-control" id="description" rows="3" name="description"><?= $mission->getDescription() ?></textarea>
    </div>
    <div class="mb-3">
      <label for="missionCodeName" class="col-form-label">Nom de code</label>
      <input type="text" class="form-control" id="missionCodeName" name="code_name" value="<?= $mission->getCode_name() ?>">
    </div>
    <div class="mb-3">
      <label for="startDate" class="col-form-label">Date de début</label>
      <input type="date" class="form-control" id="startDate" name="start_date" value="<?= $mission->getStart_date() ?>">
    </div>
    <div class="mb-3">
      <label for="endDate" class="col-form-label">Date de fin</label>
      <input type="date" class="form-control" id="endDate" name="end_date" value="<?= $mission->getEnd_date() ?>">
    </div>
    <div class="mb-3">
      <label for="speciality" class="col-form-label">Spécialité requise</label>
      <input type="text" name="speciality" id="speciality"  class="form-control" value="<?= $mission->getSpeciality()?>">
    </div>
    <div class="mb-3">
      <label for="country" class="col-form-label">Lieu</label>
      <input type="text" name="country" id="country" class="form-control" value="<?= $mission->getCountry()?>">
    </div>
    <div class="mb-3">
      <label for="missionType" class="col-form-label">Type</label>
      <select class="form-select" aria-label="Default select example" name="mission_type_id">
        <?php foreach($types as $type) : ?>
          <option value="<?= $mission->getMission_type_id() ?>"
          <?php 
            if ($type->getId() === $mission->getMission_type_id()) {
              echo 'selected';
            } ?>
          ><?= $type->getName() ?></option>
        <?php endforeach; ?>
      </select>    
    </div>
    <div class="mb-3">
      <label for="status" class="col-form-label">Statut</label>
      <select class="form-select" aria-label="Default select example" name="mission_status_id">
        <?php foreach($states as $state) : ?>
          <option value="<?= $mission->getMission_status_id() ?>"            
          <?php 
            if ($state->getId() === $mission->getMission_status_id()) {
              echo 'selected';
            } ?>>
            <?= $state->getName()?>
        </option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="mb-3">
      <input type="submit" class="btn btn-warning" value="Modifier">
    </div>
  </form>

<?php

require_once "../footer-admin.php";