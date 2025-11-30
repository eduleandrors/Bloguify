<?php
class userMenuController extends Controller
{

    public function index()
    {
        $this->carregarTemplate('userMenuTemplate', ["view" => "userMenu"]);
    }

    public function criarPost()
    {
        $this->carregarTemplate('userMenuTemplate', ["view" => "criarPost"]);
    }

    public function listarPosts()
    {
        $posts = $this->listarTodosPostsComCategoriaAutores();
        $this->carregarTemplate('userMenuTemplate', ["view" => "listarPosts", "posts" => $posts]);
    }

    public function criarCategoria()
    {
        $this->carregarTemplate('userMenuTemplate', ["view" => "criarCategoria"]);
    }

    public function criarUsuario()
    {
        $this->carregarTemplate('userMenuTemplate', ["view" => "criarUsuario"]);
    }

    public function criarUsuarioAction()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            if (empty($email) || empty($password)) {
                die("Campos obrigatórios");
            }

            $userModel = new Usuario();
            $userModel->criarUsuario([
                "name" => $name,
                "email" => $email,
                "password" => $password
            ]);

            header("Location: /bloguify/userMenu");
            exit;
        }
    }

    public function criarPostAction()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $titulo = $_POST["titulo"];
            $subtitulo = $_POST["subtitulo"];
            $texto = $_POST["texto"];
            $idUser = $_SESSION['id_usuario'];
            $caminhoImagem = null;
            if (!empty($_FILES['imagem']['name'])) {

                $ext = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
                $nomeNovo = uniqid() . "." . $ext;
                $destino = "uploads/imagens-postagens/" . $nomeNovo;
                if (move_uploaded_file($_FILES['imagem']['tmp_name'], $destino)) {
                    $caminhoImagem = $destino;
                } else {
                    die("Erro ao enviar imagem");
                }
            }

            $postModel = new Post();
            $postId = $postModel->criarPost([
                "titulo" => $titulo,
                "subtitulo" => $subtitulo,
                "caminhoImagem" => $caminhoImagem,
                "texto" => $texto,
                "idUser" => $idUser
            ]);

            $categoriasSelecionadas = $_POST['categorias'] ?? [];
            $postModel->vincularCategorias($postId, $categoriasSelecionadas);

            $autoresSelecionados = $_POST['autores'] ?? [];
            $postModel->vincularAutores($postId, $autoresSelecionados);


            header("Location: /bloguify/userMenu");
            exit;
        }
    }

    public function criarCategoriaAction()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nome = $_POST["nome"];

            $postModel = new Post();
            $postModel->criarCategoria([
                "nome" => $nome
            ]);
            header("Location: /bloguify/userMenu/criarCategoria");
            exit;
        }
    }

    public function listarTodosPostsComCategoriaAutores()
    {
        $postModel = new Post();
        $posts = $postModel->listarTodosPosts($_SESSION['id_usuario']);
        foreach ($posts as $key => $post) {
            $categorias = $postModel->listarCategoriasDoPost($post['id_post']);
            $autores = $postModel->listarAutoresDoPost($post['id_post']);
            $posts[$key]['categorias'] = $categorias;
            $posts[$key]['autores'] = $autores;
        }
        return $posts;
    }

    public function excluirPost($id)
    {
        $postModel = new Post();
        $postModel->excluirPost($id);

        header("Location: /bloguify/userMenu/listarPosts");
        exit;
    }

    public function updatePost()
    {
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $subtitulo = $_POST['subtitulo'];
        $texto = $_POST['texto'];
        
        $postModel = new Post();
        $postModel->atualizarPost($id, $titulo, $subtitulo, $texto);

        header("Location: /bloguify/userMenu/listarPosts");
    }

    public function publicarPost($id)
    {
        $postModel = new Post();
        $postedBy = $_SESSION['nome_usuario'];
        $postModel->publicarPost($id, $postedBy);

        header("Location: /bloguify/userMenu/listarPosts");
    }
}
