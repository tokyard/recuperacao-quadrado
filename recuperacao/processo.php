<?php

    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    require_once ("class/quadrado.class.php");

    
    $processo = isset($_GET['processo']) ? $_GET['processo'] : "";
    if ($processo == "excluir"){
        $id= isset($_GET['id']) ? $_GET['id'] : 0;
        $quadrado = new Quadrado("", "", "");
        $resultado = $quadrado->excluir($id);
            header("location:quad.php");    
                }
    

    $processo = isset($_POST['processo']) ? $_POST['processo'] : "";
    if ($processo == "salvar"){
        $id= isset($_POST['id']) ? $_POST['id'] : "";
        if ($id== 0){

            $quadrado = new Quadrado("", $_POST['lado'], $_POST['cor']);
            
            $resultado = $quadrado->inserir();
            header("location:quad.php");
        }
        else
            
            $quadrado = new quadrado($_POST['id'], $_POST['lado'], $_POST['cor']);
            $resultado = $quadrado->editar($id);
            header("location:quad.php");        
    }

//Consultar dados
function buscarDados($id){
    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT * FROM quadrado WHERE id= $id");
    $dados = array();
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $dados['id'] = $linha['id'];
        $dados['lado'] = $linha['lado'];
        $dados['cor'] = $linha['cor'];

    }
    //var_dump($dados);
    return $dados;
}
    
?>