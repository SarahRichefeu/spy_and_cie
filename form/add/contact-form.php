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

$contactController = new ContactController();
$newContact = new Contact($_POST);
$contactController->create($newContact);

header("Location: ../../templates/view/contacts.php");