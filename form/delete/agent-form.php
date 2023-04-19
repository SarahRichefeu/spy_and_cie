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
    $agentController = new AgentController();
    $agentController->delete($_GET["id"]);
    header("Location: ../../templates/view/agents.php");
} catch (Exception $e) {
    echo "L'agent n'a pas pu être supprimée.";
}
