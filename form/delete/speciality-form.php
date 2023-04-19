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
    $specialityController = new SpecialityController();
    $specialityController->delete($_GET["id"]);
    header("Location: ../../templates/view/specialities.php");
} catch (Exception $e) {
    echo "La spécialité n'a pas pu être supprimée.";
}