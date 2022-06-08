
<!DOCTYPE html>
<?php
    $nome = isset($_GET['nome']) ? $_GET['nome'] : "";
    $login = isset($_GET['login']) ? $_GET['login'] : "";
    $senha = isset($_GET['senha']) ? $_GET['senha'] : "";
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consulta do Usuário</title>
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
                include_once "class/usuario.class.php";
                $user = new Usuario("", $nome, $login, $senha);
                echo $user->desenha();
                echo "<br>".$user;
            }
            ?>
        <hr>
    </fieldset>
    <br>
</body>
</html>

