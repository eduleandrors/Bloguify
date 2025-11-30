<h1>CARREGAR POSTS NESSA VIEW AQUI</h1>
<div class="posts_container">
    <?php foreach($posts as $post): ?>
    <div class="post_card">
        <h3><?=$post['titulo']?></h3>
        <p><?= $post['subtitulo'] ?></p>
        <img class="post_card_image" src="/projeto-bloguify/<?= $post['imagem'] ?>" alt="">

        <div class="post_card_categorias">
             <?php foreach ($post['categorias'] as $categoria): ?>
                <span class="post_card_categorias_nome"><?=$categoria["nome"]?></span>
            <?php endforeach; ?>
        </div>

        <div class="post_actions">
            <button onclick="openEditModal(
                '<?= $post['id_post'] ?>',
                '<?= $post['titulo'], ENT_QUOTES?>',
                '<?= $post['subtitulo'], ENT_QUOTES?>'
            )">Editar</button>

            <a class="btn_delete" 
               href="/projeto-bloguify/userMenu/excluirPost/<?= $post['id_post'] ?>"
               onclick="return confirm('Tem certeza que deseja excluir este post?');">
                Excluir
            </a>

            <a class="btn_postar" 
               href="/projeto-bloguify/userMenu/publicarPost/<?= $post['id_post'] ?>"
            >
                Publicar
            </a>
        </div>
    </div>
    <?php endforeach; ?>

    <div id="editModal" class="modal">
    <div class="modal_content">
        <span class="close" onclick="closeEditModal()">&times;</span>

        <h2>Editar Post</h2>

        <form method="POST" action="/projeto-bloguify/userMenu/updatePost">
            <input type="hidden" id="edit_id" name="id">

            <label>Título</label>
            <input type="text" id="edit_titulo" name="titulo">

            <label>Subtítulo</label>
            <textarea id="edit_subtitulo" name="subtitulo"></textarea>

            <button type="submit">Salvar</button>
        </form>
    </div>
</div>

</div>
