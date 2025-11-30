<?php 

Class userMenuController extends Controller{

    public function index(){
        $this->carregarTemplate('userMenuTemplate', ["view"=> "userMenu"]);
    }

    public function criarPost(){
        $this->carregarTemplate('userMenuTemplate', ["view"=> "criarPost"]);
    }

    public function listarPosts(){
        $posts = $this->listarTodosPostsComCategoria();
        $this->carregarTemplate('userMenuTemplate', ["view"=> "listarPosts", "posts"=> $posts]);
    }
    
    public function criarCategoria(){
        $this->carregarTemplate('userMenuTemplate', ["view"=> "criarCategoria"]);
    }

    public function criarPostAction(){
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $titulo = $_POST["titulo"];
            $subtitulo = $_POST["subtitulo"];
            $texto = $_POST["texto"];
            $idUser = $_SESSION['id_usuario'];
            $caminhoImagem = null;
                if (!empty($_FILES['imagem']['name'])) {

                // Pega extensão
                $ext = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);

                // Gera nome único
                $nomeNovo = uniqid() . "." . $ext;

                // Caminho onde o arquivo ficará
                $destino = "uploads/imagens-postagens/" . $nomeNovo;

                // Move o arquivo
                if (move_uploaded_file($_FILES['imagem']['tmp_name'], $destino)) {
                    $caminhoImagem = $destino;
                } else {
                    die("Erro ao enviar imagem");
                }
            }

            $postModel = new Post();
            $postId = $postModel->criarPost([
                "titulo"=> $titulo,
                "subtitulo"=> $subtitulo,
                "caminhoImagem"=> $caminhoImagem,
                "texto"=> $texto,
                "idUser"=> $idUser
            ]);

            $categoriasSelecionadas = $_POST['categorias'] ?? [];
            $postModel->vincularCategorias($postId, $categoriasSelecionadas);


            header("Location: /projeto-bloguify/userMenu");
            exit;
        }
    }

    public function criarCategoriaAction(){
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $nome = $_POST["nome"];

            $postModel = new Post();
            $postModel->criarCategoria([
                "nome"=> $nome
            ]);
            header("Location: /projeto-bloguify/userMenu/criarCategoria");
            exit;
        }
    }

    public function listarTodosPostsComCategoria(){
        $postModel = new Post();
        $posts = $postModel->listarTodosPosts($_SESSION['id_usuario']);
        foreach ($posts as $key => $post) {
            // Usamos o ID do post para buscar suas categorias
            $categorias = $postModel->listarCategoriasDoPost($post['id_post']);
            
            // Anexamos o array de categorias ao array do post
            $posts[$key]['categorias'] = $categorias;
        }
        return $posts;
    }

    public function excluirPost($id){
        $postModel = new Post();
        $postModel->excluirPost($id);

        header("Location: /projeto-bloguify/userMenu/listarPosts");
        exit;
    }

    public function updatePost() {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $subtitulo = $_POST['subtitulo'];

    $postModel = new Post();
    $postModel->atualizarPost($id, $titulo, $subtitulo);

    header("Location: /projeto-bloguify/userMenu/listarPosts");
}

    public function publicarPost($id){
        $postModel = new Post();
        $postModel->publicarPost($id);

        header("Location: /projeto-bloguify/userMenu/listarPosts");
    }

}

?>