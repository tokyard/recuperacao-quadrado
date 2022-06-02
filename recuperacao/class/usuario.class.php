
<?php

include_once "conf/default.inc.php";
require_once "conf/Conexao.php";

    class Usuario {
        private $idusuario;
        private $nome;
        private $login;
        private $senha;

        public function __construct($idusuario, $nome, $login, $senha) {
            $this->setId($idusuario);
            $this->setNome($nome);
            $this->setLogin($login);
            $this->setSenha($senha);
        }

    
    
        public function getId() {return $this->idusuario;}

        public function getNome() {return $this->nome;}

        public function getLogin() {return $this->login;}

        public function getSenha() {return $this->senha;}


        public function setId($idusuario) {
                return $this->idusuario = $idusuario;
           }

        public function setNome($nome) {
                return $this->nome = $nome;
            }

        public function setLogin($login) {
                return $this->login = $login;
            }
            
            public function setSenha($senha) {
                return $this->senha = $senha;
            }

        public function inserir() {
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('INSERT INTO Usuario (nome, login, senha) VALUES(:nome, :login, :senha)');
            $stmt->bindValue(':nome', $this->getNome());
            $stmt->bindValue(':login', $this->getLogin());
            $stmt->bindValue(':senha', $this->getSenha());

            return $stmt->execute();
        }

        public function editar(){
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('UPDATE Usuario SET nome = :nome, login = :login, senha = :senha
            WHERE idusuario = :idusuario');

            $stmt->bindValue(':idusuario', $this->getId());
            $stmt->bindValue(':nome', $this->getNome());
            $stmt->bindValue(':login', $this->getLogin());
            $stmt->bindValue(':senha', $this->getSenha());

            return $stmt->execute();
        }

        public function excluir($idusuario){
            $pdo = Conexao::getInstance();
            $stmt = $pdo ->prepare('DELETE FROM Usuario WHERE idusuario = :idusuario');
            $stmt->bindValue(':idusuario', $idusuario);
            
            return $stmt->execute();
        }

        public function listar($tipo = 0, $procurar = ""){
        //abrir conexao com o banco
        $pdo = Conexao::getInstance();
        //montar sql - comando para inserir os dados
        $sql = "SELECT * FROM mydb.Usuario ";
        //adicionar parâmetros
        if ($tipo > 0)
            switch($tipo){
            case (1): $sql .= "WHERE idusuario = :procurar"; break;
            case (2): $sql .= "WHERE nome LIKE  :procurar"; $procurar .="%"; break;
            case (3): $sql .= "WHERE login LIKE :procurar"; $procurar ="%".$procurar."%"; break;
            case (4): $sql .= "WHERE senha LIKE :procurar"; $procurar ="%".$procurar."%"; break;
            }
            $stmt = $pdo->prepare($sql);
            if ($tipo > 0)
            $stmt->bindValue(':procurar',$procurar,PDO::PARAM_STR);
            $stmt->execute();   
            return $stmt->fetchALL();
    }


    function desenha(){


        $str = "<div style='width: ".$this->getNome()."px; height: ".$this->getNome()."px; background: ".$this->getLogin()."'></div>";

        return $str;
    }

    public function __toString(){
        $str = 
        "Nome do Usuário: ".$this->getNome().
        "<br>Login do Usuário: ".$this->getLogin().
        "<br>Senha do Usuário: ".$this->getSenha();
        return $str;
    }
        }
    ?>