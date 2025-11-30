<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="copyright" content="© 2025 Bloguify. Todos os direitos reservados">
    <meta name="author" content="Eduardo Leandro">
    <meta name="plagiarism-policy" content="Este conteúdo é protegido e não pode ser copiado sem permissão">
    <link rel="stylesheet" href="/bloguify/assets/styles/blog.css">
    <link rel="stylesheet" href="/bloguify/assets/styles/post.css">
    <link href="https://fonts.googleapis.com/css2?family=Stack+Sans+Text:wght@200..700&display=swap" rel="stylesheet">
    <title>Bloguify</title>
</head>
<body>
    <header class="blog_header">
        <a class="blog_header_logo" href="/bloguify/blog">
            <img src="/bloguify/assets/img/bloguify.png" alt="Logo Bloguify" width="150" height="34">
        </a>
    </header>
    <main>
        <?php 
            if(isset($view)){
                $this->carregarViewNoTemplate($view, $this->dadosModel);
            }
        ?>
    </main>
    <footer class="blog_footer">
         <a class="blog_header_logo" href="/bloguify/blog">
            <img src="/bloguify/assets/img/bloguify.png" alt="Logo Bloguify" width="150" height="34">
        </a>  
    </footer> 
    
</body>
</html>