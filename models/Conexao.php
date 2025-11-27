<?php 

Class Conexao{

    private static $instancia;

    private function __construct(){}

    public static function getConexao(){

        // verifica se o banco ja não esta instanciado
        if(!isset(self::$instancia)){
            $dbname = 'bloguify';
            $host = 'localhost';
            $user = 'root';
            $senha = '';
    
            try{
                self::$instancia = new PDO('mysql:dbname='.$dbname.';host='.$host,$user,$senha);
            }catch(Exception $e){
                echo 'Erro: '.$e;
            }
        }
        return self::$instancia;
    }
}
?>