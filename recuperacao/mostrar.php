
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
		
      	.quad{
    background-color: <?php echo $cor ?>;
 width:<?php echo $lado ?>px;
 height:<?php echo $lado ?>px;

 }
    </style>
</head>
<body>
    <?php
        require_once "menu.php";
    ?>
    <br>
    <br>
    <fieldset>
        <center>
        <?php  
            if ($acao = "salvar") {
                include_once "class/quadrado.class.php";
                $quad = new Quadrado("", $lado, $cor);
                echo $quad;
            }
            ?>
            <hr>
            <div class = "quad"></div>
        </center>
    </fieldset>
    <br>
</body>
</html>

