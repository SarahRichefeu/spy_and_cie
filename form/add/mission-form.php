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
$newMission = new Mission($_POST);
$missionController->create($newMission);


echo "<script>window.location= '../../index.php'</script>"; 