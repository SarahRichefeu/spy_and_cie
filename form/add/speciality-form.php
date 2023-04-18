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

$specialityController = new SpecialityController();
$newSpeciality = new Speciality($_POST);
$specialityController->create($newSpeciality);

header("Location: ../../templates/view/specialities.php");