<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="copyright" content="© 2025 Bloguify. Todos os direitos reservados">
    <meta name="author" content="Eduardo Leandro">
    <link rel="stylesheet" href="/bloguify/assets/styles/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Stack+Sans+Text:wght@200..700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <meta name="plagiarism-policy" content="Este conteúdo é protegido e não pode ser copiado sem permissão">
    <title>Document</title>
</head>
<body>
    <div class="form_container">
        <a class="blog_header_logo" href="/bloguify/blog">
            <img src="/bloguify/assets/img/bloguify.png" alt="Logo Bloguify" width="200" height="50">
        </a>  
        <h1>
            Faça login para gerenciar seus posts!
        </h1>
        <form class="form_login" action="/bloguify/login/logar" method="POST">
            <div class="form_inputs">
                <div class="email">
                    <label for="email">Email</label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        required
                    >
                </div>
                <div class="senha">
                    <label for="password">Senha</label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        required
                    >
                </div>
            </div>
        
            <button class="btn_form_submit" type="submit" class="btn btn-primary">
                Logar
            </button>
        </form>
    </div>
</body>
</html>