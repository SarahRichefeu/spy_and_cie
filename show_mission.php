<?php

require_once "templates\header.php";

function loadClass(string $class)
{
    if (str_contains($class, "Controller")) {
        require_once "./Controller/$class.php";
    } else {
        require_once "./Entity/$class.php";
    }
}

spl_autoload_register("loadClass");

$missionController = new MissionController();
$mission = $missionController->get($_GET['id']);

$missionTypeController = new MissionTypeController();
$missionType = $missionTypeController->get($mission->getMission_type_id())->getName();

$targetController = new TargetController();
$targets = $targetController->getAll();

$agentController = new AgentController();
$agents = $agentController->getAll();

$contactController = new ContactController();
$contacts = $contactController->getAll();

$statusController = new StatusController();
$status = $statusController->get($mission->getMission_status_id())->getName();





?>
<div class="container mt-3 card bg-light">
    <h2 class="text-center"><?= $mission->getName() ?></h2>
    <h5><?= $mission->getCode_name() ?></h5>
    <div class="card-body">
        <p class="mission-description"><?= $mission->getDescription() ?></p>
        <p>Type: <?= $missionType?></p>
        <p>Cible.s:            
            <?php
                foreach ($targets as $target) :
                    if ($target->getMission_id() === $_GET['id']) {
                        echo $target->getFirstname().' '.$target->getLastname().' - ';
                    }
            endforeach ?>
        
        </p>
        <p>Agent.s: 
            <?php
                foreach ($agents as $agent) :
                    if ($agent->getMission_id() === $_GET['id']) {
                        echo $agent->getFirstname().' '.$agent->getLastname().' - ';
                    }
            endforeach ?>
        </p>
        <p>Contact.s: 
            <?php
               foreach ($contacts as $contact) :
                if ($contact->getMission_id() == $_GET['id']) {
                    echo $contact->getFirstname().' '.$contact->getLastname().' - ';
                }
                endforeach ?>
        </p>
        <p class="start-date">Date de début: <?= $mission->getStart_date()?></p>
        <p class="end-date">Date de fin: <?= $mission->getEnd_date()?></p>
        <p>Spécialité: Hacking</p>
        <p>Pays: <?= $mission->getCountry()?></p>
        <p>Statut: <?= $status ?></p>

    </div>

</div>

<?php
require_once 'templates\footer.php';
