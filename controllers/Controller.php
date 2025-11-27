<?php 

Class Controller{
    public $dados;

    public function __construct(){
        $this->dados = array();
    }

    public function carregarTemplate($nomeView, $dadosModel = array()){

        $this->dados = $dadosModel;
        require 'views/template.php';
    }

    public function carregarViewNoTemplate($nomeView, $dadosModel = array()){

        extract($dadosModel);
        require 'views/'.$nomeView.'.php';

    }
}

?>