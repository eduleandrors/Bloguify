<?php 
    require_once "./connection.php";
    

    class User{
        public $id;
        public $name;
        public $email;
        private $password;
        private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function createUser($parameters){

    $sql = "INSERT INTO users (name, email, password) VALUES (:n, :e, :p)";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([
        ':n' => $parameters->name,
        ':e' => $parameters->email,
        ':p' => $parameters->password
    ]);
    
    }
    
    }   
