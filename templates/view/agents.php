<?php

require_once "../header-admin.php";


function loadClass(string $class)
{
    if (str_contains($class, "Controller")) {
        require_once "../../Controller/$class.php";
    } else {
        require_once "../../Entity/$class.php";
    }
}

spl_autoload_register("loadClass");

$agentController = new AgentController();
$agents = $agentController->getAll();

$countryController = new CountryController();

$missionController = new MissionController();

$specialityController = new SpecialityController();
$specialities = $specialityController->getAll();

?>

<div class="flex-grow-1 w-65">
<?php
foreach ($agents as $agent) { ?>
   <div class="missions d-lg-flex justify-content-between align-items-center">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"><?= $agent->getFirstname().' '.$agent->getLastname(); ?></h4>
            <h6 class="card-subtitle mb-2 text-muted">Nom de code: <?= $agent->getCode_name(); ?></h6>
            <p class="card-text">Date de naissance: <?= $agent->getBirthdate(); ?></p>
            <p class="card-text">Pays de naissance: <?= $countryController->get($agent->getNationality_id())->getName(); ?></p>
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
 
<?php
require_once "../footer-admin.php";