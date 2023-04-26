<?php

require_once "../header-admin.php";

$specialityController = new SpecialityController();
$count = $specialityController->count();

$perPage = 6;

require '../../tools/pagination.php';

$specialities = $specialityController->getLimited($first, $perPage);

$agentController = new AgentController();
$agents = $agentController->getAll();

?>

<div class="flex-grow-1 row ms-3 justify-content-center">
<?php
foreach ($specialities as $speciality) { ?>
    <div class="card border-secondary m-3 " style="max-width: 30rem;">
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