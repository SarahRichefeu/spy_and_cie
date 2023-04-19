<?php

require_once "../header-admin.php";


$contactController = new ContactController();
$contacts = $contactController->getAll();

$missionController = new MissionController();

?>

<div class="flex-grow-1 w-65">
<?php
foreach ($contacts as $contact) { ?>
   <div class="missions d-lg-flex justify-content-between align-items-center">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"><?= $contact->getFirstname().' '.$contact->getLastname(); ?></h4>
            <h6 class="card-subtitle mb-2 text-muted">Nom de code: <?= $contact->getCode_name(); ?></h6>
            <p class="card-text">Date de naissance: <?= $contact->getBirthdate(); ?></p>
            <p class="card-text">Pays de naissance: <?= $contact->getNationality(); ?></p>
            <p class="card-text">Mission.s: <?php
            if ($contact->getMission_id() === null) {
              echo 'Pas de mission en cours';
            }  else {
              echo $missionController->get($contact->getMission_id())->getName(); 
              }?></p>
          </div>
        </div>
        <div class="btn">
          <!-- if connected -->
          <button type="button" class="btn btn-outline-dark"><a href="../update/contact.php?id=<?= $contact->getId()?>">Modifier</a></button>
        </div>
    </div>
<?php }; ?>
</div>
 
<?php
require_once "../footer-admin.php";