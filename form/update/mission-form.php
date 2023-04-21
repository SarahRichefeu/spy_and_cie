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

$missionController = new MissionController();
$updatedMission = new Mission($_POST);
$missionController->update($updatedMission);

echo "<script>window.location= '../../index.php'</script>"; 