<?php
require_once "templates\header.php";
require_once 'Entity\Mission.php';
require_once 'Controller\MissionController.php';

/* if admin is connected 
    require_once 'templates\nav_admin.php';
*/

$missionController = new MissionController();
$missions = $missionController->getAll();

foreach ($missions as $mission) { ?>
   <div class="missions d-lg-flex justify-content-between align-items-center">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"><?= $mission->getName(); ?></h4>
            <h6 class="card-subtitle mb-2 text-muted"><?= $mission->getCode_name(); ?></h6>
            <p class="card-text"><?= $mission->getDescription(); ?></p>
          </div>
        </div>
        <div class="btn">
                <button type="button" class="btn btn-outline-dark"><a href="show_mission.php">Détails</a></button>
        </div>
    </div>
<?php }; 

require_once 'templates\footer.php';
?>