<?php

require_once "../header-admin.php";

$stashController = new StashController();
$stash = $stashController->get($_GET['id']);

$missionController = new MissionController();
$missions = $missionController->getAll();

?>

<div class="delete d-flex justify-content-end">
    <button class="btn btn-danger">
      <a href="../../form/delete/stash-form.php?id=<?= $stash->getId()?>">Supprimer la planque n° <?= $stash->getId()?></a>
    </button>
</div>

<form action="../../form/update/stash-form.php" class="form-group container flex-grow-1" method="POST">
    <h3 class="text-center">Modifier une planque</h3> 
    <div class="mb-3">
      <label for="id" class="col-form-label">Identifiant: </label>
      <input type="text" class="form-control" id="id" name="id" value="<?= $stash->getId()?>" readonly>
      <small id="emailHelp" class="form-text text-muted">L'identifiant doit rester unique, vous ne pouvez pas le changer.</small>
    </div>   
    <div class="mb-3">
      <label for="adress" class="col-form-label">Adresse: </label>
      <input type="text" class="form-control" id="adress" name="adress" value="<?= $stash->getAdress()?>">
    </div>
    <div class="mb-3">
      <label for="type" class="col-form-label">Type: </label>
      <input type="text" class="form-control" id="type" name="type" value="<?= $stash->getType()?>">
    </div>
    <div class="mb-3">
      <label for="country" class="col-form-label">Lieu: </label>
      <input type="text" name="country" id="country" class="form-control" value="<?= $stash->getCountry()?>">
    </div>
    <div class="mb-3">
        <h5>Missions: </h5>
        <?php  foreach ($missions as $mission) : ?>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="<?= $mission->getId()?>" id="flexCheckDefault" name="mission_id"
            <?php 
                if($mission->getId() == $stash->getMission_id()){
                    echo "checked";
                }
            ?>
            >
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