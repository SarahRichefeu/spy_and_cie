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

$contactController = new ContactController();
$updatedContact = new Contact($_POST);
$contactController->update($updatedContact);

header("Location: ../../templates/view/contacts.php");