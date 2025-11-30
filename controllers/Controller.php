<?php 

Class Controller{
    public $dadosModel;

    public function __construct(){
        $this->dadosModel = array();
    }

    public function carregarTemplate($nomeTemplate, $dadosModel = array()){

        $this->dadosModel = $dadosModel;
        extract($dadosModel);
        require 'views/'.$nomeTemplate.'.php';
    }

    public function carregarViewNoTemplate($nomeView, $dadosModel = array()){

        extract($dadosModel);
        require 'views/'.$nomeView.'.php';
    }
}

?>