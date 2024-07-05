<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="../../<?= $_SERVER['PHP_SELF']; ?>"><i class="fab fa-bootstrap"></i> My Beautiful Website</a>

    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav nav nav-pills">
        
          
          <?php if(isset($_SESSION['role']) AND $_SESSION['role'] === 'user'): ?>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle user" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="fa-regular fa-circle-user"></i> <?= $_SESSION['auth']?></a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="../../<?= $_SERVER['PHP_SELF']; ?>?p=compte">Mon Compte</a></li>
              
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="../../<?= $_SERVER['PHP_SELF']; ?>?p=login&t=logout">Se déconnecter</a></li>
            </ul>
          </li>

          <?php else: ?>
            <li class="nav-item">
              <a class="nav-link user" href="../../<?= $_SERVER['PHP_SELF']; ?>?p=login&t=connexion"><i class="fa-regular fa-circle-user"></i> Connexion</a>
            </li>
          <?php endif; ?>

         
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

  </div>
</nav>


<?php
  
  if(isset($_SESSION['success'])){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">'.$_SESSION['success'].'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    unset($_SESSION['success']);
  }elseif(isset($_SESSION['error'])){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$_SESSION['error'].'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    unset($_SESSION['error']);
  }

?>