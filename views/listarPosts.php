<h1>Seus Posts</h1>
<div class="posts_container">
    <?php foreach($posts as $post): ?>
    <div class="post_card">
        <h3><?=$post['titulo']?></h3>
        <p><?= $post['subtitulo'] ?></p>
        <img class="post_card_image" src="/bloguify/<?= $post['imagem'] ?>" alt="">

        <div class="post_card_categorias">
             <?php foreach ($post['categorias'] as $categoria): ?>
                <span class="post_card_categorias_nome"><?=$categoria["nome"]?></span>
            <?php endforeach; ?>
        </div>
        <div class="post_card_categorias">
             <?php foreach ($post['autores'] as $autor): ?>
                <span class="post_card_categorias_nome"><?=$autor["name"]?></span>
            <?php endforeach; ?>
        </div>

        <div class="post_actions">
            <button onclick="openEditModal(
                '<?= $post['id_post'] ?>',
                `<?= addslashes($post['titulo']) ?>`,
                `<?= addslashes($post['subtitulo']) ?>`,
                `<?= addslashes($post['texto']) ?>`
            )">Editar</button>

            <a class="btn_delete" 
               href="/bloguify/userMenu/excluirPost/<?= $post['id_post'] ?>"
               onclick="return confirm('Tem certeza que deseja excluir este post?');">
                Excluir
            </a>

            <a class="btn_postar" 
               href="/bloguify/userMenu/publicarPost/<?= $post['id_post'] ?>"
            >
                Publicar
            </a>
            <a class="btn_mostrar" 
               href="/bloguify/blog/post/<?=$post["id_post"]?>"
            >
                Mostrar
            </a>
        </div>
    </div>
    <?php endforeach; ?>

    <div id="editModal" class="modal_edicao">
    <div class="modal_edicao_content">
        <span class="close" onclick="closeEditModal()">&times;</span>

        <h2>Editar Post</h2>

        <form method="POST" action="/bloguify/userMenu/updatePost">
            <input type="hidden" name="id" id="edit_id">
            <div class="form_container">
            <div class="form_inputs_1">
                <div class="form_inputs_containers">
                    <label for="titulo">Título:</label>
                    <input
                        type="text"
                        name="titulo"
                        id="edit_titulo"
                        required
                    >
                </div>
                <div class="form_inputs_containers">
                    <label for="subtitulo">Subtítulo:</label>
                    <input
                        type="text"
                        name="subtitulo"
                        id="edit_subtitulo"
                        required
                    >
                </div>
                <div class="form_input_textarea">
                    <label for="texto">Texto:</label>
                    <textarea
                        name="texto"
                        id="edit_texto"
                        required
                    ></textarea>
                </div>
            </div>
        </div>



            <button type="submit">Salvar</button>
        </form>
    </div>
</div>

</div>
