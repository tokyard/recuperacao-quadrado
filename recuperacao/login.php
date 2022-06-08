<?php 
    session_start();
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    include_once('class/usuario.class.php');
    $login = isset($_POST["login"]) ? $_POST["login"] : "";     
    $senha = isset($_POST["senha"]) ? $_POST["senha"] : ""; 
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="back">
    <main class="container">
    <form action="login.php?processo=login" method="post">
            <center>
            <br>
            <br>
            <h3>Quadrado Master</h3>
            <br>
            <div class="form-group col-lg-3">
            <input type="text" name="login" id="login" class="form-control" placeholder="Insira o Usuário"><br>
            <input type="password" name="senha" id="senha" class="form-control" placeholder="Insira a Senha"><br>
            <input  class = "btn btn-dark" type="submit" name = "processo" value="Login">
        </form>
        <?php
             error_reporting(0);
             if($_GET['processo'] == 'login'){
             $user = new Usuario("","","","");
             if ($user->efetuaLogin($login, $senha) == true){
                 echo "Bem-vindo!";
                 header("location:user.php");
             } else {
                 echo "<br><br>Erro ao entrar";
             }
         } 
        ?>
    </center>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>