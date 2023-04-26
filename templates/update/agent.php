<?php

require_once "../header-admin.php";

$agentController = new AgentController();
$agent = $agentController->get($_GET['id']);

$specialityController = new SpecialityController();
$specialities = $specialityController->getAll();

$statusController = new StatusController();
$states = $statusController->getAll();

$missionController = new MissionController();
$missions = $missionController->getAll();

?>


<div class="delete d-flex justify-content-end">
    <button class="btn btn-danger">
      <a href="../../form/delete/agent-form.php?id=<?= $agent->getId()?>">Supprimer l'agent n° <?= $agent->getId()?></a>
    </button>
</div>

<form action="../../form/update/agent-form.php" class="form-group container flex-grow-1" method="POST">
    <h3 class="text-center">Modifier un agent</h3>
    <div class="mb-3">
      <label for="id" class="col-form-label">Identifiant: </label>
      <input type="text" class="form-control" id="id" name="id" value="<?= $agent->getId()?>" readonly>
      <small id="emailHelp" class="form-text text-muted">L'identifiant doit rester unique, vous ne pouvez pas le changer.</small>
    </div>
    <div class="mb-3">
      <label for="lastname" class="col-form-label">Nom: </label>
      <input type="text" class="form-control" id="lastname" name="lastname" value="<?= $agent->getLastname()?>">
    </div>
    <div class="mb-3">
      <label for="firstname" class="col-form-label">Prénom: </label>
      <input type="text" class="form-control" id="firstname" name="firstname" value="<?= $agent->getFirstname()?>">
    </div>
    <div class="mb-3">
      <label for="birthdate" class="col-form-label">Date de naissance: </label>
      <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?= $agent->getBirthdate()?>">
    </div>
    <div class="mb-3">
      <label for="agentCodeName" class="col-form-label">Nom de code</label>
      <input type="text" class="form-control" id="agentCodeName" name="code_name" value="<?= $agent->getCode_name()?>">
    </div>
    <div class="mb-3">
      <label for="country" class="col-form-label">Lieu de naissance: </label>
      <input type="text" name="nationality" id="nationality" class="form-control" value="<?= $agent->getNationality()?>">
    </div>
    <div class="mb-3">
        <h5>Missions: </h5>
        <p class="text-muted">Un agent ne peut être actif seulement sur une seule mission à la fois.</p>
        <?php  foreach ($missions as $mission) : ?>
          <div class="form-check">
            <input class="form-check-input" type="radio" id="flexCheckDefault" name="mission_id" value="<?= $mission->getId()?>"
            <?= $mission->getId() == $agent->getMission_id() ? "checked" : "" ?>>
            <label class="form-check-label" for="flexCheckDefault">
              <?=  $mission->getName()?>
            </label>
          </div>
        <?php endforeach; ?>
    </div>
    <div class="mb-3">
      <button type="submit" class="btn btn-warning">Modifier</button>
    </div>
  </form>

<?php

require_once "../footer-admin.php";