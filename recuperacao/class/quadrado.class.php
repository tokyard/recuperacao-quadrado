
<?php
    class Quadrado {
        private $id;
        private $lado;
        private $cor;

        public function __construct($id, $lado, $cor) {
            $this->setId($id);
            $this->setLado($lado);
            $this->setCor($cor);
        }

        public function __toString(){
            $str = 
            "Tamanho do Lado: ".$this->getLado().
            "<br>Cor do Quadrado: ".$this->getCor().
            "<br>Área: ".$this->Area().
            "<br>Perímetro: ". $this->Perimetro().
            "<br>Diagonal: ". $this->Diagonal(); 
                return $str;
        }
    
        public function getId() {return $this->id;}

        public function getLado() {return $this->lado;}

        public function getCor() {return $this->cor;}


        public function setId($id) {
                return $this->id = $id;
           }

        public function setLado($lado) {
                return $this->lado = $lado;
            }

        public function setCor($cor) {
                return $this->cor = $cor;
            }
            
            
    public function Area(){

    $area = $this->lado * $this->lado;;
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
            $stmt = $pdo->prepare('INSERT INTO Quadrado (lado, cor) VALUES(:lado, :cor)');
            $stmt->bindValue(':lado', $this->getLado());
            $stmt->bindValue(':cor', $this->getCor());

            return $stmt->execute();
        }

        public function editar($id) {
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare("UPDATE `quadrado` SET `lado` = :lado, `cor` = :cor WHERE (`id` = :id);");
            $stmt->bindValue(':id', $this->setId($this->id), PDO::PARAM_INT);
            $stmt->bindValue(':lado', $this->setLado($this->lado), PDO::PARAM_STR);
            $stmt->bindValue(':cor', $this->setCor($this->cor), PDO::PARAM_STR);
            return $stmt->execute();
        }

        public function excluir($id){
            $pdo = Conexao::getInstance();
            $stmt = $pdo ->prepare('DELETE FROM quadrado WHERE id = :id');
            $stmt->bindValue(':id', $id);
            
            return $stmt->execute();
        }

        public function buscarQuadrado($id){
            require_once("conf/Conexao.php");

            $conexao = Conexao::getInstance();

            $query = 'SELECT * FROM Quadrado';
            if($id > 0){
                $query .= ' WHERE id = :id';
                $stmt->bindParam(':id', $id);
            }
                $stmt = $conexao->prepare($query);
                if($stmt->execute())
                    return $stmt->fetchAll();
        
                return false;

        }
    }

    ?>