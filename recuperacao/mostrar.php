
<!DOCTYPE html>
<?php
    $lado = isset($_GET['lado']) ? $_GET['lado'] : 0;
    $cor = isset($_GET['cor']) ? $_GET['cor'] : "";
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consulta do Quadrado></title>
    <style>
		
      	div{
    background-color: <?php echo $cor ?>;
 width:<?php echo $lado ?>px;
 height:<?php echo $lado ?>px;

 }

    </style>
</head>
<body>
    <header>
   
  
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
            <ul class="navbar-nav mr-auto">

            <li>

            <a class="nav-link" href="	consulta.php">Lista</a>

            </li>

            <li class="nav-item">
                <a class="nav-link" href="teste.php">Teste</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cadquad.php">Cadastro</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="processo.php">Processo</a>
            </li>
    
    
            <ul>
        </div>
        </div>
		<br>
		<br>
    </nav>
    <br>
    <br>
    </header>
    <br>
    <fieldset>
        <?php  
            if ($acao = "salvar") {
                include_once "class/quadrado.class.php";
                $quad = new Quadrado("", $lado, $cor);
                echo $quad;
            }
            ?>
            <hr>
            <div class = "square"></div>
    </fieldset>
    <br>
</body>
</html>

