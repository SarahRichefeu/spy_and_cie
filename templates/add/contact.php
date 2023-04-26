<?php

require_once "../header-admin.php";

$missionController = new MissionController();
$missions = $missionController->getAll();


?>

  <form action="../../form/add/contact-form.php" class="form-group container flex-grow-1" method="POST">
    <h3 class="text-center">Ajouter un contact</h3>
    <div class="mb-3">
      <label for="lastname" class="col-form-label">Nom: </label>
      <input type="text" class="form-control" id="lastname" name="lastname">
    </div>
    <div class="mb-3">
      <label for="firstname" class="col-form-label">Prénom: </label>
      <input type="text" class="form-control" id="firstname" name="firstname">
    </div>    
    <div class="mb-3">
      <label for="agentCodeName" class="col-form-label">Nom de code</label>
      <input type="text" class="form-control" id="agentCodeName" name="code_name">
    </div>
    <div class="mb-3">
      <label for="birthdate" class="col-form-label">Date de naissance: </label>
      <input type="date" class="form-control" id="birthdate" name="birthdate">
    </div>
    <div class="mb-3">
      <label for="country" class="col-form-label">Lieu de naissance: </label>
      <input type="text" name="nationality" id="nationality" class="form-control">
    </div>
    <div class="mb-3">
        <h5>Missions: </h5>
        <?php  foreach ($missions as $mission) : ?>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="<?= $mission->getId()?>" id="flexCheckDefault" name="mission_id">
            <label class="form-check-label" for="flexCheckDefault">
              <?=  $mission->getName()?>
            </label>
          </div>
        <?php endforeach; ?>
    </div>
    <div class="mb-3">
      <button type="submit" class="btn btn-light">Ajouter</button>
    </div>
  </form>

<?php

require_once "../footer-admin.php";