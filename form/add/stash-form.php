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

var_dump($_POST);

$stashController = new stashController();
$newStash = new Stash($_POST);
$stashController->create($newStash);

echo "<script>window.location= '../../templates/view/stashs.php'</script>"; 