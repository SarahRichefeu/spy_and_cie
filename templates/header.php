<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css\bootstrap.min.css">
    <link rel="stylesheet" href="css\override.css">
    
    <title>Spy&Cie</title>
</head>
<body>

    <div class="container-fluid">
        <header class="d-flex flex-wrap align-items-center justify-content-between justify-content-sm-between py-3 mb-4 border-bottom">
          <div class="col-md-3 mb-2 mb-md-0">
            <a href="index.php" class="d-inline-flex link-body-emphasis text-decoration-none">
                <img src="assets\logo.png" alt="logo" class="logo">
            </a>
          </div>
        <?php
        // if admin is connected 
            require_once 'templates\nav_admin.php';
        ?>
      <div class="login col-md-3 text-end">
        <button type="button" class="btn btn-light me-4">
            <a href="login.php">Log In</a>
            <!-- if admin is connected -> 
            <a href="logout.php">Log Out</a> --> 
        </button>
      </div>
    </header>
  </div>

