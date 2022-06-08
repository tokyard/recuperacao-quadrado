<?php
session_start();

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       
      <a class="nav-link active" aria-current="page" href="#"><?php print_r($_SESSION['nome']);?>  </a>
    </a>
    <a class="nav-link active" aria-current="page" href="login.php">| Sair |</a>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Consultas |
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="quad.php">Quadrados</a></li>
            <li><a class="dropdown-item" href="tab.php">Tabuleiros</a></li>
            <li><a class="dropdown-item" href="user.php">Usuário</a></li>
          </ul>
          
        </li>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cadastros |
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="cadquad.php">Cadastro de Quadrados</a></li>
          <li><a class="dropdown-item" href="cadtab.php">Cadastro de Tabuleiros</a></li>
          <li><a class="dropdown-item" href="caduser.php">Cadastro de Usuários</a></li>
      </ul>
      <ul>
     
     
    </div>
  </div>
</nav>
</nav>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<script src="bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>