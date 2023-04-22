<?php

require_once "../header-admin.php";


$agentController = new AgentController();
$agents = $agentController->getAll();

$missionController = new MissionController();

$specialityController = new SpecialityController();
$specialities = $specialityController->getAll();



?>

<div class="flex-grow-1 w-65">
<?php
foreach ($agents as $agent) { 
  $birthdate = new DateTime($agent->getBirthdate());?>
   <div class="missions d-lg-flex justify-content-between align-items-center">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"><?= $agent->getFirstname().' '.$agent->getLastname(); ?></h4>
            <h6 class="card-subtitle mb-2 text-muted">Nom de code: <?= $agent->getCode_name(); ?></h6>
            <p class="card-text">Date de naissance: <?= $birthdate->format('d/m/Y'); ?></p>
            <p class="card-text">Pays de naissance: <?= $agent->getNationality(); ?></p>
            <p class="card-text">Spécialité.s : <?php
            foreach ($specialities as $speciality) {
              if ($speciality->getAgent_id() === $agent->getId()) {
                echo $speciality->getName(). ' - ';
              }
            }?> </p>
            <p class="card-text">Mission.s: <?php
            if ($agent->getMission_id() === null) {
              echo 'Pas de mission en cours';
            }  else {
              echo $missionController->get($agent->getMission_id())->getName(); 
              }?></p>
          </div>
        </div>
        <div class="btn">
          <!-- if connected -->
          <button type="button" class="btn btn-outline-dark"><a href="../update/agent.php?id=<?= $agent->getId()?>">Modifier</a></button>
        </div>
    </div>
<?php }; ?>
</div>

<nav aria-label='Page navigation'>
  <ul class="pagination">
    <li class="page-item disabled">
      <a class="page-link" href="#">&laquo;</a>
    </li>
    <li class="page-item active">
      <a class="page-link" href="#">1</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">2</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">3</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">4</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">5</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">&raquo;</a>
    </li>
  </ul>
</nav>
 
<?php
require_once "../footer-admin.php";