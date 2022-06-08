
<?php

include_once "conf/default.inc.php";
require_once "conf/Conexao.php";

    class Tabuleiro {
        private $idtabuleiro;
        private $lado;
    

        public function __construct($idtabuleiro, $lado) {
            $this->setId($idtabuleiro);
            $this->setLado($lado);
        }


    
    public function getId() {return $this->idtabuleiro;}
    public function getLado() {return $this->lado;}
    public function setId($idtabuleiro) { return $this->idtabuleiro = $idtabuleiro;}
    public function setLado($lado) {return $this->lado = $lado;}

    public function Area(){
    $area = $this->lado * $this->lado;
    return $area;
    }
    
    public function Perimetro(){
        $perimetro = $this->lado * 4;
        return $perimetro;
    }
    
    public function inserir() {
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('INSERT INTO Tabuleiro (lado) VALUES(:lado)');
        $stmt->bindValue(':lado', $this->getLado());
        return $stmt->execute();
        }

    public function editar($idtabuleiro) {
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare("UPDATE `tabuleiro` SET `lado` = :lado WHERE (`idtabuleiro` = :idtabuleiro);");
        $stmt->bindValue(':idtabuleiro', $this->setId($this->idtabuleiro), PDO::PARAM_INT);
        $stmt->bindValue(':lado', $this->setLado($this->lado), PDO::PARAM_STR);
        return $stmt->execute();
        }

        
    function desenha(){
        $str = "<div style='height: ".$this->getLado()."vw; width: ".$this->getLado()."vw; background-color: #b4a0cd;'></div>";
        return $str;
    }

    function excluir($idtabuleiro){
        $pdo = Conexao::getInstance();
        $stmt = $pdo ->prepare('DELETE FROM tabuleiro WHERE idtabuleiro = :idtabuleiro');
        $stmt->bindValue(':idtabuleiro', $idtabuleiro);
        
        return $stmt->execute();
    }
    public function listar($tipo = 0, $procurar = ""){
        //abrir conexao com o banco
        $pdo = Conexao::getInstance();
        //montar sql - comando para inserir os dados
        $sql = "SELECT * FROM mydb.Tabuleiro ";
        //adicionar parâmetros
        if ($tipo > 0)
            switch($tipo){
            case (1): $sql .= "WHERE idtabuleiro = :procurar"; break;
            case (2): $sql .= "WHERE lado LIKE  :procurar"; $procurar .="%"; break;
            }
        $stmt = $pdo->prepare($sql);
        if ($tipo > 0)
        $stmt->bindValue(':procurar',$procurar,PDO::PARAM_STR);
        $stmt->execute();   
        return $stmt->fetchALL();
    }

    
    public function buscar($idtabuleiro){
        require_once("conf/Conexao.php");
        $conexao = Conexao::getInstance();
        $query = 'SELECT * FROM Tabuleiro';
        if($idtabuleiro > 0){
        $query .= ' WHERE idtabuleiro = :idtabuleiro';
        $stmt->bindParam(':idtabuleiro', $idtabuleiro);
        }
        $stmt = $conexao->prepare($query);
        if($stmt->execute())
        return $stmt->fetchAll();
        return false;

    }

    public function __toString(){
        $str = 
        "Tamanho do Lado: ".$this->getLado().
        "<br>Área: ".$this->Area().
        "<br>Perímetro: ". $this->Perimetro(); 
            return $str;
    }

    }

    ?>