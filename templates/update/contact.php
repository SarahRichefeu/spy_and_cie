<?php

require_once "../header-admin.php";

$contactController = new ContactController();
$contact = $contactController->get($_GET['id']);

$specialityController = new SpecialityController();
$specialities = $specialityController->getAll();

$statusController = new StatusController();
$states = $statusController->getAll();

$missionController = new MissionController();
$missions = $missionController->getAll();

?>


<form action="" class=" delete d-flex justify-content-end">
        <input type="submit" class="btn btn-danger" value="Supprimer">
</form> 

<form action="../../form/update/contact-form.php" class="form-group container flex-grow-1" method="POST">
    <h3 class="text-center">Modifier une cible</h3>
    <div class="mb-3">
      <label for="id" class="col-form-label">Identifiant: </label>
      <input type="text" class="form-control" id="id" name="id" value="<?= $contact->getId()?>" readonly>
      <small id="emailHelp" class="form-text text-muted">L'identifiant doit rester unique, vous ne pouvez pas le changer.</small>
    </div>
    </div>
    <div class="mb-3">
      <label for="lastname" class="col-form-label">Nom: </label>
      <input type="text" class="form-control" id="lastname" name="lastname" value="<?= $contact->getLastname()?>">
    </div>
    <div class="mb-3">
      <label for="firstname" class="col-form-label">Prénom: </label>
      <input type="text" class="form-control" id="firstname" name="firstname" value="<?= $contact->getFirstname()?>">
    </div>
    <div class="mb-3">
      <label for="birthdate" class="col-form-label">Date de naissance: </label>
      <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?= $contact->getBirthdate()?>">
    </div>
    <div class="mb-3">
      <label for="contactCodeName" class="col-form-label">Nom de code</label>
      <input type="text" class="form-control" id="contactCodeName" name="code_name" value="<?= $contact->getCode_name()?>">
    </div>
    <div class="mb-3">
      <label for="country" class="col-form-label">Lieu de naissance: </label>
      <input type="text" name="nationality" id="nationality" class="form-control" value="<?= $contact->getNationality()?>">
    </div>
    <div class="mb-3">
        <h5>Mission: </h5>
        <?php  foreach ($missions as $mission) : ?>
          <div class="form-check">
            <input class="form-check-input" type="radio" id="flexCheckDefault" name="mission_id" value="<?= $mission->getId()?>"
            <?php 
                if($mission->getId() == $contact->getMission_id()){
                    echo "checked";
                }
            ?>
            >
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