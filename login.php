<?php 
require_once 'templates\header.php';


$adminController = new AdminController();



if (isset($_POST['login'])) {
  $admin = $adminController->verifyAdmin($_POST['email'], $_POST['password']);

  if ($admin) {
      $_SESSION['admin'] = ['email' => $_POST['email']];
      echo "<script>window.location= 'index.php'</script>";
    } else {
       $errorMessage = "Email ou mot de passe incorrect";
    }
}

?>

<div class="">
  <?php if (isset($errorMessage)) { ?>
    <div class="alert alert-danger" role="alert">
      <?= $errorMessage ?>
    </div>
  <?php } ?>
</div>


<h2>Se connecter</h2>

<form  method="POST" class="container-fluid w-50 flex-grow-1">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control bg-light text-dark" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control bg-light text-dark" id="exampleInputPassword1">
  </div>
  <button type="submit" name="login" class="btn btn-light">Submit</button>
</form>


<?php

require_once 'templates\footer.php';