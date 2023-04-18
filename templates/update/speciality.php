<?php

require_once "../header-admin.php";

$specialityControlller = new SpecialityController();
$speciality = $specialityControlller->get($_GET['id']);

$agentController = new AgentController();
$agents = $agentController->getAll();

?>

<form action="" class=" delete d-flex justify-content-end">
        <input type="submit" class="btn btn-danger" value="Supprimer">
</form>

  <form action="../../form/update/speciality-form.php" method="POST" class="form-group container flex-grow-1">
    <h3 class="text-center">Modifier une spécialité</h3>
    <p>Une spécialité doit être détenue par un seul agent à la fois. Nous voulons des agents spéciaux et uniques. Bien évidemment, un agent peut avoir plusieurs spécialités.</p>
    <div class="mb-3">
      <label for="id" class="col-form-label">Identifiant: </label>
      <input type="text" class="form-control" id="id" name="id" value="<?= $speciality->getId()?>" readonly>
      <small id="emailHelp" class="form-text text-muted">L'identifiant doit rester unique, vous ne pouvez pas le changer.</small>
    </div>
    <div class="mb-3">
      <label for="firstname" class="col-form-label">Spécialité: </label>
      <input type="text" class="form-control" id="firstname" name="name" value="<?= $speciality->getName()?>">
    </div>
    <div class="mb-3">
        <h5>Agent concerné (un seul choix): </h5>
        <?php foreach ($agents as $agent) : ?>
          <div class="form-check">
            <input class="form-check-input" type="radio" value="<?= $agent->getId()?>" id="flexCheckDefault" name="agent_id"
            <?php
                if ($agent->getId() == $speciality->getAgent_id()) {
                    echo "checked";
                }
            ?>
            >
            <label class="form-check-label" for="flexCheckDefault">
              <?= $agent->getFirstname() . " " . $agent->getLastname() ?>
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