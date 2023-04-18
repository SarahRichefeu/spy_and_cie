<?php

require_once "../header-admin.php";



$missionController = new MissionController();
$missions = $missionController->getAll();
?>

  <form action="../../form/add/stash-form.php" class="form-group container flex-grow-1" method="POST">
    <h3 class="text-center">Ajouter une planque</h3>    
    <div class="mb-3">
      <label for="adress" class="col-form-label">Adresse:  </label>
      <input type="text" class="form-control" id="adress" name="adress">
    </div>
    <div class="mb-3">
      <label for="type" class="col-form-label">Type: </label>
      <input type="text" class="form-control" id="type" name="type">
    </div>
    <div class="mb-3">
      <label for="country" class="col-form-label">Lieu: </label>
      <input type="text" name="country" id="country" class="form-control">
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