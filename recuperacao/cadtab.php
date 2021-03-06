<!DOCTYPE html>
<?php
    include_once "processoI.php";
    require_once "class/tabuleiro.class.php";
    $idtabuleiro = isset($_GET['idtabuleiro']) ? $_GET['idtabuleiro'] : "";
    $processo = isset($_GET['processo']) ? $_GET['processo'] : "";
    if ($processo == 'editar'){
       $tab = new Tabuleiro($idtabuleiro, 1);
       $lista = $tab->listar(1, $idtabuleiro);
       $tab->setLado($lista[0]['lado']);

}
    $title = "Cadastro de Tabuleiro";
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
        <h3>Insira o Tabuleiro</h3><hr>
                <form method="post" action="processoI.php">
                <div class="form-group col-lg-3">

                <p>ID</p>
                    <input readonly  type="text" name="idtabuleiro" id="idtabuleiro" class="form-control" value="<?php if ($processo == "editar") echo $tab->getId(); else echo 0; ?>"><br>

                <p>Lado</p>
                    <input name="lado" id="lado" type="text" required="true" class="form-control" value="<?php if ($processo == "editar") echo $tab->getLado(); ?>" placeholder="Digite o lado"><br>         
                
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