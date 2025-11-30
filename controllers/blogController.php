<?php 

Class blogController extends Controller{

    public function index(){
        $postModel = new Post();
        $posts = $postModel->listarPostsPublicados();

        foreach ($posts as $key => $post) {
            $categorias = $postModel->listarCategoriasDoPost($post['id_post']);
            $autores = $postModel->listarAutoresDoPost($post['id_post']);
            $posts[$key]['categorias'] = $categorias;
            $posts[$key]['autores'] = $autores;
        }

        $this->carregarTemplate('blog', ["view"=> "posts", "posts"=> $posts]);

    }

    public function post($id){
        $postModel = new Post();
        $post = $postModel->exibirPostClicado($id);

        $categorias = $postModel->listarCategoriasDoPost($id);
        $post['categorias'] = $categorias;
        $autores = $postModel->listarAutoresDoPost($id);
        $post['autores'] = $autores;

        $this->carregarTemplate('blog', ["view"=> "post", "post"=>$post]);
    }
}


?>