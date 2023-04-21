<?php

require_once "../header-admin.php";

$targetController = new TargetController();
$target = $targetController->get($_GET['id']);

$specialityController = new SpecialityController();
$specialities = $specialityController->getAll();

$statusController = new StatusController();
$states = $statusController->getAll();

$missionController = new MissionController();
$missions = $missionController->getAll();

?>


<div class="delete d-flex justify-content-end">
    <button class="btn btn-danger">
      <a href="../../form/delete/target-form.php?id=<?= $target->getId()?>">Supprimer la cible n° <?= $target->getId()?></a>
    </button>
</div>

<form action="../../form/update/target-form.php" class="form-group container flex-grow-1" method="POST">
    <h3 class="text-center">Modifier une cible</h3>
    <div class="mb-3">
      <label for="id" class="col-form-label">Identifiant: </label>
      <input type="text" class="form-control" id="id" name="id" value="<?= $target->getId()?>" readonly>
      <small id="emailHelp" class="form-text text-muted">L'identifiant doit rester unique, vous ne pouvez pas le changer.</small>
    </div>
    </div>
    <div class="mb-3">
      <label for="lastname" class="col-form-label">Nom: </label>
      <input type="text" class="form-control" id="lastname" name="lastname" value="<?= $target->getLastname()?>">
    </div>
    <div class="mb-3">
      <label for="firstname" class="col-form-label">Prénom: </label>
      <input type="text" class="form-control" id="firstname" name="firstname" value="<?= $target->getFirstname()?>">
    </div>
    <div class="mb-3">
      <label for="birthdate" class="col-form-label">Date de naissance: </label>
      <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?= $target->getBirthdate()?>">
    </div>
    <div class="mb-3">
      <label for="targetCodeName" class="col-form-label">Nom de code</label>
      <input type="text" class="form-control" id="targetCodeName" name="code_name" value="<?= $target->getCode_name()?>">
    </div>
    <div class="mb-3">
      <label for="country" class="col-form-label">Lieu de naissance: </label>
      <input type="text" name="nationality" id="nationality" class="form-control" value="<?= $target->getNationality()?>">
    </div>
    <div class="mb-3">
        <h5>Mission: </h5>
        <?php  foreach ($missions as $mission) : ?>
          <div class="form-check">
            <input class="form-check-input" type="radio" id="flexCheckDefault" name="mission_id" value="<?= $mission->getId()?>" <?= $mission->getId() == $target->getMission_id() ? "checked" : "" ?>>
            <label class="form-check-label" for="flexCheckDefault">
              <?=  $mission->getName()?>
            </label>
          </div>
        <?php endforeach; ?>
    </div>
    <div class="mb-3">
      <button type="submit" class="btn btn-warning">Modifier</button>
    </div>
  </form>

<?php

require_once "../footer-admin.php";