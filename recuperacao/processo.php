<?php

    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    require_once ("class/quadrado.class.php");
    require_once ("class/tabuleiro.class.php");

    
    $processo = isset($_GET['processo']) ? $_GET['processo'] : "";
    if ($processo == "excluir"){
        $idquadrado= isset($_GET['idquadrado']) ? $_GET['idquadrado'] : 0;
        $quadrado = new Quadrado("", "", "","");
        $resultado = $quadrado->excluir($idquadrado);
            header("location:quad.php");    
                }
    

    $processo = isset($_POST['processo']) ? $_POST['processo'] : "";
    if ($processo == "salvar"){
        $idquadrado= isset($_POST['idquadrado']) ? $_POST['idquadrado'] : "";
        if ($idquadrado== 0){
            $quadrado = new Quadrado("", $_POST['lado'], $_POST['cor'], $_POST['tabuleiro_idtabuleiro']);
            $resultado = $quadrado->inserir();
            header("location:quad.php");
        }
        else
            $quadrado = new Quadrado($_POST['idquadrado'], $_POST['lado'], $_POST['cor'], $_POST['tabuleiro_idtabuleiro']);
            $resultado = $quadrado->editar();
            header("location:quad.php");        
    }

//Consultar dados
    function exibir($chave, $dados){
        $str = 0;
        foreach($dados as $linha){
        $str .= "<option selected value='".$linha[$chave[0]]."'>ID: ".$linha[$chave[0]]." | Lado: ".$linha[$chave[1]]."</option>";
        }
        return $str;
}

    function lista_tabuleiro($idtabuleiro){
        $tab = new Tabuleiro("","");
        $lista = $tab->buscar($idtabuleiro);
        return exibir(array('idtabuleiro', 'lado'), $lista);

}
    
?>