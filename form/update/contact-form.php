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

echo "<script>window.location= '../../templates/view/contacts.php'</script>"; 