<?php 

Class Core{

    public function __construct(){
        $this->run();
    }

    public function run(){

        $parametros = array();
        
        if(isset($_GET['pag'])){
            $url = $_GET['pag'];
        }

        // tem alguma coisa depois do dominio www.exemplo.com/classe/funcao/parametro
        if(!empty($url)){
            $url = explode('/', $url);
            $controller = $url[0].'Controller'; //noticia
            array_shift($url);

            // if o usuario mandou funcao
            if(isset($url[0]) && !empty($url[0])){
                $metodo = $url[0];
                array_shift($url);
            }
            // mandou somente classe
            else{
                $metodo = 'index';

            }

            if(count($url)>0){
                $parametros = $url;
            }
        } 
        
        else{
            $controller = 'homeController';
            $metodo = 'index';
        }

        $caminho = 'bloguify/controllers/'.$controller.'.php';

        if(!file_exists($caminho) && !method_exists($controller, $metodo)){
            $controller = 'homeController';
            $metodo = 'index';

        }
        
        $c = new $controller;
        call_user_func_array(array($c, $metodo), $parametros);
    }

}

?>