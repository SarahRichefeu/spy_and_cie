<?php


$missionController = new MissionController();
$count = $missionController->count();

$perPage = 5;

require "tools/pagination.php";

$missions = $missionController->getLimited($first, $perPage);
$count = $missionController->count();

?>

<div class="flex-grow-1">
<?php
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
          <button type="button" class="btn btn-outline-dark"><a href="show_mission.php?id=<?= $mission->getId()?>">Détails</a></button>
          <?php if (isset($_SESSION['admin'])) { ?>
            <button type="button" class="btn btn-outline-dark"><a href="templates/update/mission.php?id=<?= $mission->getId()?>">Modifier</a></button>
          <?php } ?>
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