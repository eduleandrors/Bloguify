<?php foreach($posts as $post):?>
            <a href="/bloguify/blog/post/<?=$post["id_post"]?>">
                <div class="container_post_card">
                        <img class="post_card_image" src="/bloguify/<?=$post['imagem']?>" alt="foto postagem blog">
                    <div class="post_card_container_content">
                        <div class="post_container_categories">
                            <?php foreach ($post['categorias'] as $categoria): ?>
                                <span class="post_category"><?=$categoria["nome"]?></span>
                            <?php endforeach; ?>
                        </div>
                        <h3 class="post_title"><?=$post['titulo']?></h3>
                        <p class="post_subtitle"><?=$post['subtitulo']?></p>
                        <span class="post_postedOn">Publicado em <?= (new DateTime($post['postedOn']))->format("d/m/Y \à\s H:i") ?></span>
                    </div>
                </div>
            </a>

<?php endforeach; ?>