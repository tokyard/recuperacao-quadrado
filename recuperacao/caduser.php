
<!DOCTYPE html>
<?php
    include_once "processoII.php";
    require_once "class/usuario.class.php";
    $idusuario = isset($_GET['idusuario']) ? $_GET['idusuario'] : "";
    $processo = isset($_GET['processo']) ? $_GET['processo'] : "";
    if ($processo == 'editar'){
       $user = new Usuario($idusuario, "", "", "");
       $lista = $user->listar(1, $idusuario);
       $user->setNome($lista[0]['nome']);
       $user->setLogin($lista[0]['login']);
       $user->setSenha($lista[0]['senha']);

}
    $title = "Cadastro de Usuário";
    // var_dump($dados);
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="body">
<?php
        require_once "menu.php";
    ?>
    <div class="container-fluid">
    <br>
    <center>
        <h3>Insira o Usuário</h3><hr>
                <form method="post" action="processoII.php">
                <div class="form-group col-lg-3">

                <p>ID</p>
                    <input readonly  type="text" name="idusuario" id="idusuario" class="form-control" value="<?php if ($processo == "editar") echo $user->getId(); else echo 0; ?>"><br>

                <p>Nome</p>
                    <input name="nome" id="nome" type="text" required="true" class="form-control" value="<?php if ($processo == "editar") echo $user->getNome(); ?>" placeholder="Digite o nome"><br>    
                    
                <p>Login</p>
                    <input name="login" id="login" type="text" required="true" class="form-control" value="<?php if ($processo == "editar") echo $user->getLogin(); ?>" placeholder="Digite o login"><br>         
                   
                <p>Senha</p>
                    <input name="senha" id="senha" type="password" required="true" class="form-control" value="<?php if ($processo == "editar") echo $user->getSenha(); ?>" placeholder="Digite a senha"><br>         
                    <br>
                    <button name="processo" value="salvar" id="processo" type="submit" class="btn btn-dark">Salvar</button>
                </div>
            </form>
</center>
    </div>
    <script src="bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>