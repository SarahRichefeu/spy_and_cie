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
    $stashController = new StashController();
    $stashController->delete($_GET["id"]);
    header("Location: ../../templates/view/stashs.php");
} catch (Exception $e) {
    echo "La planque n'a pas pu être supprimée.";
}
