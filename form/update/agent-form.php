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

$agentController = new AgentController();
$updatedAgent = new Agent($_POST);
$agentController->update($updatedAgent);

header("Location: ../../templates/view/agents.php");