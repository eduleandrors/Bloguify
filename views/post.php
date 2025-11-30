
<article class="post">

    <button class="botao_voltar" onclick="window.location.href='/bloguify/blog'"><</button>
    <h1 class="titulo"><?=$post['titulo']?></h1>
    <div class="categorias">
        <?php foreach ($post['categorias'] as $categoria): ?>
            <span class="categoria"><?=$categoria["nome"]?></span>
            <?php endforeach; ?>
        </div>

    <div class="post_autors">
    <span class="post_postedOn">Publicado por <strong><?=$post['postedBy']?></strong> em <?= (new DateTime($post['postedOn']))->format("d/m/Y \à\s H:i") ?>/ </span>
        <span post_postedOn>Escrito por </span>
        <?php foreach ($post['autores'] as $autor): ?>
                <span class="post_autors"><strong><?=$autor["name"]?> </strong>,</span>
        <?php endforeach; ?>
    </div>
    <span><?=$post["subtitulo"]?></span>
    <img class="imagem_post" src="/bloguify/<?=$post['imagem']?>" alt="imagem do post">
    <section>
        <?=nl2br($post["texto"])?>
    </section>
</article>
