<?php 

Class Controller{
    public $dadosModel;

    public function __construct(){
        $this->dadosModel = array();
    }

    public function carregarTemplate($nomeView, $dadosModel = array()){

        $this->dadosModel = $dadosModel;
        require 'views/template.php';
    }

    public function carregarViewNoTemplate($nomeView, $dadosModel = array()){

        extract($dadosModel);
        require 'views/'.$nomeView.'.php';
    }
}

?>