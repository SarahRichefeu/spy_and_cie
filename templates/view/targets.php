<?php

require_once "../header-admin.php";

$targetController = new TargetController();
$count = $targetController->count();

$perPage = 3;

require "../../tools/pagination.php";

$targets = $targetController->getLimited($first, $perPage);

$missionController = new MissionController();

$specialityController = new SpecialityController();
$specialities = $specialityController->getAll();

?>

<div class="flex-grow-1 w-65">
<?php
foreach ($targets as $target) { 
  $birthdate = new DateTime($target->getBirthdate());?>
   <div class="missions d-lg-flex justify-content-between align-items-center">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"><?= $target->getFirstname().' '.$target->getLastname(); ?></h4>
            <h6 class="card-subtitle mb-2 text-muted">Nom de code: <?= $target->getCode_name(); ?></h6>
            <p class="card-text">Date de naissance: <?= $birthdate->format('d/m/Y'); ?></p>
            <p class="card-text">Pays de naissance: <?= $target->getNationality() ?></p>
            <p class="card-text">Mission.s: <?php
            if ($target->getMission_id() === null) {
              echo 'Pas de mission en cours';
            }  else {
              echo $missionController->get($target->getMission_id())->getName(); 
              }?></p>
          </div>
        </div>
        <div class="btn">
          <!-- if connected -->
          <button type="button" class="btn btn-outline-dark"><a href="../update/target.php?id=<?= $target->getId()?>">Modifier</a></button>
        </div>
    </div>
<?php }; ?>
</div>

<div class="m-auto">
  <nav aria-label='Page navigation'>
    <ul class="pagination p-3">
      <li class="page-item disabled">
        <a class="page-link" href="#">&laquo;</a>
      </li>
        <?php for ($i = 1; $i <= $nbPages; $i++) { ?>
          <li class="page-item">
            <a class="page-link <?= ($currentPage == $i) ? 'active' : '' ?>" href="?page=<?= $i ?>"><?= $i ?></a>
          </li>
        <?php } ?>
      <li class="page-item">
        <a class="page-link" href="#">&raquo;</a>
      </li>
    </ul>
  </nav>
</div> 
 
<?php
require_once "../footer-admin.php";