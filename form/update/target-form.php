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

$targetController = new TargetController();
$updatedTarget = new Target($_POST);
$targetController->update($updatedTarget);

echo "<script>window.location= '../../templates/view/targets.php'</script>"; 