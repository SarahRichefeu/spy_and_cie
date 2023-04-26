<?php
// Nombre de pages total
$nbPages = ceil($count / $perPage);

// Page courante
if (isset($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1;
}
if ($currentPage > $nbPages) $currentPage = 1;


// 1er élément de la page
$first = ($currentPage - 1) * $perPage;