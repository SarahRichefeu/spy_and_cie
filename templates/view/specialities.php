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

$specialityController = new SpecialityController();
$specialities = $specialityController->getAll();

$agentController = new AgentController();
$agents = $agentController->getAll();

?>

<div class="flex-grow-1 row ms-3">
<?php
foreach ($specialities as $speciality) { ?>
    <div class="card border-secondary m-3 col-sm-6 " style="max-width: 20rem;">
      <div class="card-header">Spécialité</div>
      <div class="card-body">
        <h4 class="card-title"><?= $speciality->getName(); ?></h4>
        <p class="card-text">Agent concerné.e:  <?php
        foreach ($agents as $agent) {
            if ($speciality->getAgent_id() === $agent->getId()) {
                echo $agent->getFirstname().' '.$agent->getLastname(). ' - ';
            }
        }?>
        </p>
    </div>
    <div class="btn">
        <!-- if connected -->
        <button type="button" class="btn btn-outline-dark"><a href="../update/speciality.php?id=<?= $speciality->getId()?>">Modifier</a></button>
    </div>
    </div>
<?php }; ?>
</div>
 
<?php
require_once "../footer-admin.php";        