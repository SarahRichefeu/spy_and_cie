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

$specialityController = new SpecialityController();
$updatedSpeciality = new Speciality($_POST);
$specialityController->update($updatedSpeciality);

echo "<script>window.location= '../../templates/view/specialities.php'</script>"; 