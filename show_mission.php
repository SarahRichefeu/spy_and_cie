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
        <p>Cible.s: </p>
        <p>Agent.s: Toi</p>
        <p>Contact.s: </p>
        <p class="start-date">Date de début: <?= $mission->getStart_date()?></p>
        <p class="end-date">Date de fin: <?= $mission->getEnd_date()?></p>
        <p>Spécialité: Hacking</p>
        <p>Pays: <?= $country?></p>
        <p>Statut: <?= $status ?></p>

    </div>

</div>

<?php
require_once 'templates\footer.php';
