<?php 

Class homeController extends Controller{

    public function index(){
        $this->carregarTemplate('template', ["view"=> "home"]);
    }

    public function docs(){
        $this->carregarTemplate('template', ["view"=> "docs"]);
    }

    public function faleConosco(){
        $this->carregarTemplate('template', ["view"=> "faleConosco"]);
    }

    public function sobreNos(){
        $this->carregarTemplate('template', ["view"=> "sobreNos"]);
    }
}



?>