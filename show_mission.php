<?php

require_once "templates\header.php";


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

$startDate = new DateTime($mission->getStart_date());
$endDate = new DateTime($mission->getEnd_date());



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
        <p class="start-date">Date de début: <?= $startDate->format('d/m/Y')?></p>
        <p class="end-date">Date de fin: <?= $endDate->format('d/m/Y')?></p>
        <p>Spécialité: <?= $mission->getSpeciality()?></p>
        <p>Pays: <?= $mission->getCountry()?></p>
        <p>Statut: <?= $status ?></p>

    </div>

    <?php if (isset($_SESSION['admin'])) { ?>
    <div class="delete d-flex justify-content-end">
        <button class="btn btn-warning">
            <a href='templates/update/mission.php?id=<?= $mission->getId() ?>'>Modifier la mission</a>
        </button>
     </div>
    <?php } ?>

</div>

<?php
require_once 'templates\footer.php';
