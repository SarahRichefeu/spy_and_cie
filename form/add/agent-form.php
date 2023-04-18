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

$agentController = new AgentController();
$newAgent = new Agent($_POST);
$agentController->create($newAgent);

var_dump($newAgent);

header("Location: ../../templates/view/agents.php");  