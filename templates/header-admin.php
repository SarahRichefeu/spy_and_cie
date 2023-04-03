<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css\bootstrap.min.css">
    <link rel="stylesheet" href="../../css\override.css">
    
    <title>Spy&Cie</title>
</head>
<body>

    <div class="container-fluid">
        <header class="d-flex flex-wrap align-items-center justify-content-between justify-content-sm-between py-3 mb-4 border-bottom">
          <div class="col-md-3 mb-2 mb-md-0">
            <a href="../../index.php" class="d-inline-flex link-body-emphasis text-decoration-none">
                <img src="../../assets/logo.png" alt="Logo" class="logo">
            </a>
          </div>
              <!-- if admin is connected-->
              <ul class="nav nav-admin col-12 col-md-auto mb-2 mb-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Missions</a>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="../../index.php">Voir</a>
                        <a class="dropdown-item" href="../../templates/add/mission.php">Ajouter</a>
                    </div>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Agents</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="../../templates/view/agents.php">Voir</a>
                        <a class="dropdown-item" href="../../templates/add/agent.php">Ajouter</a>
                    </div>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Cibles</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="../../templates/view/targets.php">Voir</a>
                        <a class="dropdown-item" href="../../templates/add/target.php">Ajouter</a>
                    </div>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Planques</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="../../templates/view/stashs.php">Voir</a>
                        <a class="dropdown-item" href="../../templates/add/stash.php">Ajouter</a>
                    </div>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Spécialités</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="../../templates/view/specialities.php">Voir</a>
                        <a class="dropdown-item" href="../../templates/add/speciality.php">Ajouter</a>
                    </div>
                    </li>
              </ul>
      <div class="login col-md-3 text-end">
        <button type="button" class="btn btn-light me-4">
            <a href="../../login.php">Log Out</a>
        </button>
      </div>
    </header>
  </div>