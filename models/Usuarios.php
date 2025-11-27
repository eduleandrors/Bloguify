<?php 
    require_once 'Conexao.php';

Class Usuarios{

    private $con;

    public function __construct(){
        $this->con = Conexao::getConexao();
    }

    public function getUsuarios(){
        $dados = array();
        $cmd = $this->con->query('select * from users');
        $dados = $cmd->fetchall(PDO::FETCH_ASSOC);
        return $dados;
    }
}

?>