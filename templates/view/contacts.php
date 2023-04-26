<?php

require_once "../header-admin.php";


$contactController = new ContactController();
$count = $contactController->count();

$perPage = 3;

require '../../tools/pagination.php';

$contacts = $contactController->getLimited($first, $perPage);

$missionController = new MissionController();

?>

<div class="flex-grow-1 w-65">
<?php
foreach ($contacts as $contact) { 
  $birthdate = new DateTime($contact->getBirthdate());?>
   <div class="missions d-lg-flex justify-content-between align-items-center">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"><?= $contact->getFirstname().' '.$contact->getLastname(); ?></h4>
            <h6 class="card-subtitle mb-2 text-muted">Nom de code: <?= $contact->getCode_name(); ?></h6>
            <p class="card-text">Date de naissance: <?= $birthdate->format('d/m/Y'); ?></p>
            <p class="card-text">Pays de naissance: <?= $contact->getNationality(); ?></p>
            <p class="card-text">Mission.s: <?php
            if ($contact->getMission_id() === null) {
              echo 'Pas de mission en cours';
            }  else {
              echo $missionController->get($contact->getMission_id())->getName(); 
              }?></p>
          </div>
        </div>
        <div class="btn">
          <!-- if connected -->
          <button type="button" class="btn btn-outline-dark"><a href="../update/contact.php?id=<?= $contact->getId()?>">Modifier</a></button>
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
            <a class="page-link <?= ($currentPage == $i) ? 'active' : '' ?>" href="contacts.php?page=<?= $i ?>"><?= $i ?></a>
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