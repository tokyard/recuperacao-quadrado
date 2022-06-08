
<!DOCTYPE html>
<?php
    $lado = isset($_GET['lado']) ? $_GET['lado'] : 0;
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consulta do Tabuleiro</title>
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
                include_once "class/tabuleiro.class.php";
                $tab = new Tabuleiro("", $lado);
                echo $tab->desenha();
                echo "<br>".$tab;
            }
            ?>
            <hr>
        </center>
    </fieldset>
    <br>
</body>
</html>

