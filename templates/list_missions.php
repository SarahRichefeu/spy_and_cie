<?php


$missionController = new MissionController();
$missions = $missionController->getAll();

?>

<div class="flex-grow-1">
<?php
foreach ($missions as $mission) { ?>
   <div class="missions d-lg-flex justify-content-between align-items-center">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"><?= $mission->getName(); ?></h4>
            <h6 class="card-subtitle mb-2 text-muted"><?= $mission->getCode_name(); ?></h6>
            <p class="card-text"><?= $mission->getDescription(); ?></p>
          </div>
        </div>
        <div class="btn">
          <button type="button" class="btn btn-outline-dark"><a href="show_mission.php?id=<?= $mission->getId()?>">Détails</a></button>
          <?php if (isset($_SESSION['admin'])) { ?>
            <button type="button" class="btn btn-outline-dark"><a href="templates/update/mission.php?id=<?= $mission->getId()?>">Modifier</a></button>
          <?php } ?>
        </div>
    </div>
<?php }; ?>
</div>
 