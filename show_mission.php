<?php
require_once "templates\header.php";
require_once "Entity\Mission.php";
require_once "Entity\Country.php";
require_once "Entity\Status.php";
require_once "Controller\MissionController.php";
require_once "Controller\CountryController.php";
require_once "Controller\StatusController.php";

$missionController = new MissionController();
$mission = $missionController->get($_GET['id']);

$countryController = new CountryController();
$country = $countryController->get($mission->getCountry_id())->getName();

$statusController = new StatusController();
$status = $statusController->get($mission->getMission_status_id())->getName();



?>
<div class="container mt-3 card bg-light">
    <h2 class="text-center"><?= $mission->getName() ?></h2>
    <h5><?= $mission->getCode_name() ?></h5>
    <div class="card-body">
        <p class="mission-description"><?= $mission->getDescription() ?></p>
        <p>Type: Assassination</p>
        <p>Cible: </p>
        <p>Agent: Toi</p>
        <p>Contact: </p>
        <p class="start-date">Date de début: <?= $mission->getStart_date()?></p>
        <p class="end-date">Date de fin: <?= $mission->getEnd_date()?></p>
        <p>Spécialité: Hacking</p>
        <p>Pays: <?= $country?></p>
        <p>Statut: <?= $status ?></p>

    </div>

</div>

<?php
require_once 'templates\footer.php';
