<?php

    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    require_once ("class/usuario.class.php");

    
            $processo = isset($_GET['processo']) ? $_GET['processo'] : "";
            if ($processo == "excluir"){
            $idusuario= isset($_GET['idusuario']) ? $_GET['idusuario'] : 0;
            $user = new Usuario("", "", "", "");
            $resultado = $user->excluir($idusuario);
                header("location:user.php");    
                }
    
            $processo = isset($_POST['processo']) ? $_POST['processo'] : "";
            if ($processo == "salvar"){
            $idusuario= isset($_POST['idusuario']) ? $_POST['idusuario'] : "";
            if ($idusuario== 0){
            $user = new Usuario("", $_POST['nome'],$_POST['login'],$_POST['senha']);
            $resultado = $user->inserir();
                header("location:user.php");
        } else
            $user = new Usuario($_POST['idusuario'], $_POST['nome'], $_POST['login'],$_POST['senha']);
            $resultado = $user->editar($idusuario);
                header("location:user.php");        
    }

?>