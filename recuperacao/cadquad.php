<!DOCTYPE html>
<?php
    include_once "processo.php";
    require_once "class/quadrado.class.php";
    $idquadrado = isset($_GET['idquadrado']) ? $_GET['idquadrado'] : "";
    $processo = isset($_GET['processo']) ? $_GET['processo'] : "";
    $dados;
    if ($processo == 'editar'){
        $quad = new Quadrado($idquadrado, 1, "1", 1);
        $lista = $quad->listar(1, $idquadrado);
        $quad->setLado($lista[0]['lado']);
        $quad->setCor($lista[0]['cor']);
        $quad->setIdTab($lista[0]['tabuleiro_idtabuleiro']);
 
}
    $title = "Cadastro de Quadrado";
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
        <h3>Insira o Quadrado</h3><hr>
                <form method="post" action="processo.php">
                <div class="form-group col-lg-3">

                <p>ID</p>
                    <input readonly  type="text" name="idquadrado" id="idquadrado" class="form-control" value="<?php if ($processo == "editar") echo $quad->getId(); else echo 0; ?>"><br>

                <p>Lado</p>
                    <input name="lado" id="lado" type="text" required="true" class="form-control" value="<?php if ($processo == "editar") echo $quad->getLado();; ?>" placeholder="Digite o lado"><br>         
                
                <p>Cor</p>
                    <input name="cor" id="cor" type="color" required="true" class="form-control" value="<?php if ($processo == "editar") echo $quad->getCor(); ?>" placeholder="Digite o cor"><br>
                       <br>
                <p> Escolha o Tabuleiro </p>
                    <select name="tabuleiro_idtabuleiro"  id="tabuleiro_idtabuleiro" class="form-select" value="<?php if ($processo == "editar") echo $quad->getIdTab(); ?>">
                        <?php
                        require_once ("processo.php");
                            echo lista_tabuleiro(0); 
                        ?>
        </select>
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