<?php

require_once "../header-admin.php";


$stashController = new StashController();
$stashs = $stashController->getAll();


$missionController = new MissionController();

?>

<div class="flex-grow-1 w-65">
<?php
foreach ($stashs as $stash) { ?>
   <div class="missions d-lg-flex justify-content-between align-items-center">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"><?= $stash->getCountry() ?></h4>
            <p class="card-text" >Type de planque: <?= $stash->getType(); ?></p>
            <p class="card-text">Adresse: <?= $stash->getAdress(); ?></p>
            <p class="card-text">Utilisée pour la mission suivante: <?php
            if ($stash->getMission_id() === null) {
              echo 'Pas utilisé';
            }  else {
              echo $missionController->get($stash->getMission_id())->getName(); 
              }?></p>
          </div>
        </div>
        <div class="btn">
          <!-- if connected -->
          <button type="button" class="btn btn-outline-dark"><a href="../update/stash.php?id=<?= $stash->getId()?>">Modifier</a></button>
        </div>
    </div>
<?php }; ?>
</div>
 
<?php
require_once "../footer-admin.php";