<?php

require_once "../header-admin.php";


$stashController = new StashController();
$count = $stashController->count();

$perPage = 3;

require_once "../../tools/pagination.php";

$stashs = $stashController->getLimited($first, $perPage);


$missionController = new MissionController();

?>

<div class="flex-grow-1 w-65">
<?php
foreach ($stashs as $stash) { ?>
   <div class="missions d-lg-flex justify-content-between align-items-center">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"><?= $stash->getCountry() ?></h4>
            <p class="card-text" >Type de planque: <?= $stash->getType(); ?></p>
            <p class="card-text">Adresse: <?= $stash->getAdress(); ?></p>
            <p class="card-text">Utilisée pour la mission suivante: <?php
            if ($stash->getMission_id() === null) {
              echo 'Pas utilisé';
            }  else {
              echo $missionController->get($stash->getMission_id())->getName(); 
              }?></p>
          </div>
        </div>
        <div class="btn">
          <!-- if connected -->
          <button type="button" class="btn btn-outline-dark"><a href="../update/stash.php?id=<?= $stash->getId()?>">Modifier</a></button>
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