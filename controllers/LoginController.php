<?php 

Class LoginController extends Controller{

    private $pdo;

    public function __construct()
    {
        $this->pdo = Conexao::getConexao();
    }

    public function index(){        
        $this->carregarViewNoTemplate('login');
    }
    
    public function cadastro(){
        $this->carregarViewNoTemplate('cadastro');
    }

    public function cadastrar(){
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        if (empty($email) || empty($password)) {
            die("Campos obrigatórios");
        }

        $userModel = new Usuario();
        $result = $userModel->criarUsuario([
            "name" => $name,
            "email" => $email,
            "password" => $password
        ]);

        if ($result === true) {
            session_start();
            session_unset();
            session_destroy();
            header('Location: /projeto-bloguify/login');
        } else {
            echo "Erro ao logar";
        }
    }
    }

    public function logar(){
        if($_SERVER["REQUEST_METHOD"] === "POST"){

            $email = $_POST["email"];
            $password = $_POST["password"];

            if (empty($email) || empty($password)){
                die("Campos obrigatórios");
            }

            $userModel = new Usuario();
            $result = $userModel->logarUsuario([
                "email" => $email,
                "password" => $password
            ]);

            if($result){
                $this->carregarViewNoTemplate('areaPrivada');
                exit;
            }else{
                echo "Email ou senha incorretos - tente novamente.";
            }
        }
    }

    public function sair(){
        session_start();
        session_unset();
        session_destroy();
        header('Location: /projeto-bloguify/');
        exit;
    }

}

?>