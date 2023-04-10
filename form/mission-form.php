<?php

function loadClass(string $class)
{
    if (str_contains($class, "Controller")) {
        require_once "../Controller/$class.php";
    } else {
        require_once "../Entity/$class.php";
    }
}

var_dump($_POST);



spl_autoload_register("loadClass");

$missionController = new MissionController();
$newMission = new Mission($_POST);
$missionController->create($newMission);

var_dump($newMission);