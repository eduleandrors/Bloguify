<?php 
    require_once 'Conexao.php';

Class Usuario{

    private $pdo;

    public function __construct(){
        $this->pdo = Conexao::getConexao();
    }

    public function getUsuarios(){
        $dados = array();
        $cmd = $this->pdo->query('select * from users');
        $dados = $cmd->fetchall(PDO::FETCH_ASSOC);
        return $dados;
    }

    public function criarUsuario($params){
        $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password) LIMIT 1";
        $stmt = $this->pdo->prepare($sql);

        $hashedPassword = password_hash($params["password"], PASSWORD_DEFAULT);
        return $stmt->execute([
            ":name" => $params["name"],
            ":email" => $params["email"],
            ":password" => $hashedPassword
        ]);
    }

    public function logarUsuario($params){
        $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ":email" => $params["email"],
        ]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if(!$user){
            return false;
        }

        if(password_verify($params["password"], $user["password"])){
            return $user;
        }
    
        return false;
    }

}

?>