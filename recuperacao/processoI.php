<?php

    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    require_once ("class/tabuleiro.class.php");

    
    $processo = isset($_GET['processo']) ? $_GET['processo'] : "";
    if ($processo == "excluir"){
        $idtabuleiro= isset($_GET['idtabuleiro']) ? $_GET['idtabuleiro'] : 0;
        $tabuleiro = new Tabuleiro("", "");
        $resultado = $tabuleiro->excluir($idtabuleiro);
            header("location:tab.php");    
                }
    

    $processo = isset($_POST['processo']) ? $_POST['processo'] : "";
    if ($processo == "salvar"){
        $idtabuleiro= isset($_POST['idtabuleiro']) ? $_POST['idtabuleiro'] : "";
        if ($idtabuleiro== 0){

            $tabuleiro = new Tabuleiro("", $_POST['lado']);
            
            $resultado = $tabuleiro->inserir();
            header("location:tab.php");
        }
        else
            
            $tabuleiro = new Tabuleiro($_POST['idtabuleiro'], $_POST['lado']);
            $resultado = $tabuleiro->editar($idtabuleiro);
            header("location:tab.php");        
    }

?>