<h1>
    TELA DE CRIAÇÃO DOS POSTS
</h1>
<?php 
require_once __DIR__ . '/../models/Conexao.php';

// Busca categorias
$stmt = Conexao::getConexao()->query("SELECT * FROM categoria ORDER BY nome ASC");
$categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<div class="criar_post">
    <form action="/projeto-bloguify/userMenu/criarPostAction" method="POST" enctype="multipart/form-data">
        <div>
            <label for="titulo">Título:</label>
            <input 
                type="text"
                name="titulo"
                id="titulo"
                required
            >   
        </div>
        <div>
            <label for="subtitulo">subtítulo:</label>
            <input 
                type="text"
                name="subtitulo"
                id="subtitulo"
                required
            >   
        </div>
        <div>
            <label for="imagem">Imagem da capa</label>
            <input 
                type="file" 
                name="imagem" 
                accept="image/*" 
                required>
        </div>
        <div>
            <label for="texto">subtítulo:</label>
            <input 
                type="text"
                name="texto"
                id="texto"
                required
            >   
        </div>
        <div>
            <label for="categorias">Categorias (máx. 3):</label>
            <select name="categorias[]" id="categorias" multiple size="3" required>
                <?php foreach($categorias as $cat): ?>
                    <option value="<?= $cat['id_categoria'] ?>"><?=$cat['nome']?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">
        Criar
        </button>
    </form>
</div>