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
    $contactController = new ContactController();
    $contactController->delete($_GET["id"]);
    echo "<script>window.location= '../../templates/view/contacts.php'</script>"; 
} catch (Exception $e) {
    echo "Le contact n'a pas pu être supprimé.";
}