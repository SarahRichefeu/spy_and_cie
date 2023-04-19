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

try {
    $targetController = new TargetController();
    $targetController->delete($_GET["id"]);
    header("Location: ../../templates/view/targets.php");
} catch (Exception $e) {
    echo "La cible n'a pas pu être supprimée.";
}