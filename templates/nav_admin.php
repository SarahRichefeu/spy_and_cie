<?php

?>

<div class="container-fluid">
    <header class="d-flex flex-wrap align-items-center justify-content-between justify-content-sm-between py-3 mb-4 border-bottom">
      <div class="col-md-3 mb-2 mb-md-0">
        <a href="index.php" class="d-inline-flex link-body-emphasis text-decoration-none">
            <img src="assets\logo.png" alt="logo" class="logo">
        </a>
      </div>
      <!-- if admin is connected-->
      <ul class="nav nav-admin col-12 col-md-auto mb-2 mb-md-0 d-none">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Missions</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="index.php">Voir</a>
                <a class="dropdown-item" href="#">Ajouter</a>
                <a class="dropdown-item" href="#">Modifier</a>
            </div>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Agents</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Voir</a>
                <a class="dropdown-item" href="#">Ajouter</a>
                <a class="dropdown-item" href="#">Modifier</a>
            </div>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Cibles</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Voir</a>
                <a class="dropdown-item" href="#">Ajouter</a>
                <a class="dropdown-item" href="#">Modifier</a>
            </div>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Planques</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Voir</a>
                <a class="dropdown-item" href="#">Ajouter</a>
                <a class="dropdown-item" href="#">Modifier</a>
            </div>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Spécialités</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Voir</a>
                <a class="dropdown-item" href="#">Ajouter</a>
                <a class="dropdown-item" href="#">Modifier</a>
            </div>
            </li>
      </ul>

      <div class="login col-md-3 text-end">
        <button type="button" class="btn btn-light me-4">
            <a href="login.php">Log In</a>
            <!-- if admin is connected -> 
            <a href="logout.php">Log Out</a> --> 
        </button>
      </div>
    </header>
  </div>