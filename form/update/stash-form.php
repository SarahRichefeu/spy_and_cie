<?php

function loadClass(string $class)
{
    if (str_contains($class, "Controller")) {
        require_once "../../Controller/$class.php";
    } else {
        require_once "../../Entity/$class.php";
    }
}

spl_autoload_register("loadClass");

$stashController = new StashController();
$updatedStash = new Stash($_POST);
$stashController->update($updatedStash);

echo "<script>window.location= '../../templates/view/stashs.php'</script>"; 