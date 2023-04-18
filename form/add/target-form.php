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

$targetController = new TargetController();
$newTarget = new Target($_POST);
$targetController->create($newTarget);

header("Location: ../../templates/view/targets.php");