<?php 

Class UsuariosController extends Controller{
    public function index(){

        $u = new Usuarios();

        $dados = $u->getUsuarios();
        $this->carregarTemplate('usuarios');   
    }

    public function getUsuarios(){
        $this->carregarTemplate('getUsuarios');
    }
}

?>