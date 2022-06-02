
<?php

include_once "conf/default.inc.php";
require_once "conf/Conexao.php";

    class Quadrado {
        private $idquadrado;
        private $lado;
        private $cor;
        private $tabuleiro_idtabuleiro;

        public function __construct($idquadrado, $lado, $cor, $idtab) {
            $this->setId($idquadrado);
            $this->setLado($lado);
            $this->setCor($cor);
            $this->setIdTab($idtab);
        }

    
    
        public function getId() {return $this->idquadrado;}

        public function getLado() {return $this->lado;}

        public function getCor() {return $this->cor;}

        public function getIdTab() {return $this->tabuleiro_idtabuleiro;}


        public function setId($idquadrado) {
                return $this->idquadrado = $idquadrado;
           }

        public function setLado($lado) {
                return $this->lado = $lado;
            }

        public function setCor($cor) {
                return $this->cor = $cor;
            }
            
            public function setIdTab($idtab) {
                return $this->tabuleiro_idtabuleiro = $idtab;
            }
            
    public function Area(){

    $area = $this->lado * $this->lado;
    return $area;
    }
    
    public function Perimetro(){
        $perimetro = $this->lado * 4;
        return $perimetro;
    }
    
    public function Diagonal(){
        $diagonal = $this->lado * sqrt(2);
        return $diagonal;
    }
        


        public function inserir() {
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('INSERT INTO Quadrado (lado, cor, tabuleiro_idtabuleiro) VALUES(:lado, :cor, :tabuleiro_idtabuleiro)');
            $stmt->bindValue(':lado', $this->getLado());
            $stmt->bindValue(':cor', $this->getCor());
            $stmt->bindValue(':tabuleiro_idtabuleiro', $this->getIdTab());

            return $stmt->execute();
        }

        public function editar(){
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('UPDATE quadrado SET lado = :lado, cor = :cor, tabuleiro_idtabuleiro = :tabuleiro_idtabuleiro
            WHERE idquadrado = :idquadrado');

            $stmt->bindValue(':idquadrado', $this->getId());
            $stmt->bindValue(':lado', $this->getLado());
            $stmt->bindValue(':cor', $this->getCor());
            $stmt->bindValue(':tabuleiro_idtabuleiro', $this->getIdTab());

            return $stmt->execute();
        }

        public function excluir($idquadrado){
            $pdo = Conexao::getInstance();
            $stmt = $pdo ->prepare('DELETE FROM quadrado WHERE idquadrado = :idquadrado');
            $stmt->bindValue(':idquadrado', $idquadrado);
            
            return $stmt->execute();
        }

    public function listar($tipo = 0, $procurar = ""){
        //abrir conexao com o banco
        $pdo = Conexao::getInstance();
        //montar sql - comando para inserir os dados
        $sql = "SELECT * FROM mydb.quadrado ";
        //adicionar parâmetros
        if ($tipo > 0)
            switch($tipo){
            case (1): $sql .= "WHERE idquadrado = :procurar"; break;
            case (2): $sql .= "WHERE lado LIKE  :procurar"; $procurar .="%"; break;
            case (3): $sql .= "WHERE cor LIKE :procurar"; $procurar ="%".$procurar."%"; break;
            }
            $stmt = $pdo->prepare($sql);
            if ($tipo > 0)
                $stmt->bindValue(':procurar',$procurar,PDO::PARAM_STR);
        $stmt->execute();   
        return $stmt->fetchALL();
    }


    function desenha(){


        $str = "<div style='width: ".$this->getLado()."px; height: ".$this->getLado()."px; background: ".$this->getCor()."'></div>";

        return $str;
    }

    public function __toString(){
        $str = 
        "Tamanho do Lado: ".$this->getLado().
        "<br>Cor do Quadrado: ".$this->getCor().
        "<br>Tabuleiro: ".$this->getIdTab().
        "<br>Área: ".$this->Area().
        "<br>Perímetro: ". $this->Perimetro().
        "<br>Diagonal: ". $this->Diagonal(); 
            return $str;
    }
        }
    ?>