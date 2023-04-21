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
    $missionController = new MissionController();
    $missionController->delete($_GET["id"]);
    echo "<script>window.location= '../../index.php'</script>"; 
} catch (Exception $e) {
    echo "La mission n'a pas pu être supprimée.";
}

