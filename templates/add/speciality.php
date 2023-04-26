<?php

require_once "../header-admin.php";

$agentController = new AgentController();
$agents = $agentController->getAll();

?>

  <form action="../../form/add/speciality-form.php" method="POST" class="form-group container flex-grow-1">
    <h3 class="text-center">Ajouter une spécialité</h3>
    <p>Une spécialité doit être détenue par un seul agent à la fois. Nous voulons des agents spéciaux et uniques. Bien évidemment, un agent peut avoir plusieurs spécialités.</p>
    <div class="mb-3">
      <label for="firstname" class="col-form-label">Spécialité: </label>
      <input type="text" class="form-control" id="firstname" name="name">
    </div>
    <div class="mb-3">
        <h5>Agent concerné (un seul choix): </h5>
        <?php foreach ($agents as $agent) : ?>
          <div class="form-check">
            <input class="form-check-input" type="radio" value="<?= $agent->getId()?>" id="flexCheckDefault" name="agent_id">
            <label class="form-check-label" for="flexCheckDefault">
              <?= $agent->getFirstname() . " " . $agent->getLastname() ?>
            </label>
          </div>
        <?php endforeach; ?>
    </div>
    <div class="mb-3">
      <button type="submit" class="btn btn-light">Ajouter</button>
    </div>
  </form>

<?php

require_once "../footer-admin.php";