<?php 
    require_once 'Conexao.php';

Class Post{

    private $pdo;

    public function __construct(){
        $this->pdo = Conexao::getConexao();
    }

    public function criarPost($params){
        $sql = "INSERT INTO post (titulo, subtitulo, fk_id_user, imagem, texto, isPosted)
            VALUES (:titulo, :subtitulo, :fk_id_user, :imagem, :texto, 0)";
 
        $stmt = $this->pdo->prepare($sql);
        
        $stmt->execute([
            ":titulo" => $params["titulo"],
            ":subtitulo" => $params["subtitulo"],
            ":fk_id_user" => $params["idUser"],
            ":imagem" => $params["caminhoImagem"],
            ":texto" => $params["texto"]
        ]);

        return $this->pdo->lastInsertId();
        
    }

    public function criarCategoria($params){
        $sql = "INSERT INTO categoria (nome)
            VALUES (:nome)";
 
        $stmt = $this->pdo->prepare($sql);
        
        return $stmt->execute([
            ":nome" => $params["nome"]
        ]);
    }

    public function listarCategorias(){
    $sql = "SELECT * FROM categoria ORDER BY nome ASC";
    $stmt = $this->pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    public function listarTodosPosts() {
        $sql = "SELECT * FROM post";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarPostsPublicados() {
        $sql = "SELECT * FROM post WHERE isPosted = 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function excluirPost($id){
        $sql = "DELETE FROM post WHERE id_post = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }

    public function atualizarPost($id, $titulo, $subtitulo, $texto) {
        $sql = "UPDATE post SET titulo = :titulo, subtitulo = :subtitulo, texto = :texto";

        
        $sql .= " WHERE id_post = :id";

        $stmt = $this->pdo->prepare($sql);
        $params = [
            ":titulo" => $titulo,
            ":subtitulo" => $subtitulo,
            ":texto" => $texto,
            ":id" => $id
        ];

        return $stmt->execute($params);
    }
    

    public function vincularCategorias($postId, $categorias){
    $sql = "INSERT INTO post_categoria (fk_post_id, fk_categoria_id) VALUES (:post, :cat)";
    $stmt = $this->pdo->prepare($sql);
    foreach($categorias as $catId){
        $stmt->execute([
            ":post" => $postId,
            ":cat" => $catId
        ]);
    }
}

    public function vincularAutores($postId, $categorias){
    $sql = "INSERT INTO post_user (fk_id_post, fk_id_user) VALUES (:post, :autor)";
    $stmt = $this->pdo->prepare($sql);
    foreach($categorias as $autorId){
        $stmt->execute([
            ":post" => $postId,
            ":autor" => $autorId
        ]);
    }
}

    public function listarCategoriasDoPost($postId,){
        $sql = "SELECT c.* FROM categoria c
                INNER JOIN post_categoria pc ON c.id_categoria = pc.fk_categoria_id
                WHERE pc.fk_post_id = :post_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':post_id' => $postId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
    public function listarAutoresDoPost($postId){
        $sql = "SELECT * FROM users 
                INNER JOIN post_user ON users.id_user = post_user.fk_id_user
                WHERE post_user.fk_id_post = :post_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':post_id' => $postId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    public function publicarPost($postId, $postedBy){
        $sql = "UPDATE post SET isPosted = 1, postedOn = NOW(), postedBy = :postedBy WHERE id_post = :post_id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':post_id' => $postId,
            ':postedBy' => $postedBy
    ]);
    }

    public function exibirPostClicado($postId){
        $sql = "SELECT * FROM post
            WHERE id_post = :post_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':post_id' => $postId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>