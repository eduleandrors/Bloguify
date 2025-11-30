<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['id_usuario'])) {
    header('Location: /bloguify/login');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="copyright" content="© 2025 Bloguify. Todos os direitos reservados">
    <meta name="author" content="Eduardo Leandro">
    <meta name="plagiarism-policy" content="Este conteúdo é protegido e não pode ser copiado sem permissão">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="/bloguify/assets/styles/userMenu.css">
    <link href="https://fonts.googleapis.com/css2?family=Stack+Sans+Text:wght@200..700&display=swap" rel="stylesheet">
    <title>Seu espaço</title>
</head>

<body>

    <div class="layout">
        <div class="sidebar">
            <h4 class="text-dark">Painel</h4>
            <hr class="text-dark">
            <ul class="nav nav-pilsls flex-column mb-auto">
                <li>
                    <a href="/bloguify/userMenu/criarPost" class="nav-link">Criar Post</a>
                </li>
                <li>
                    <a href="/bloguify/userMenu/listarPosts" class="nav-link">Listar Posts</a>
                </li>
                <li>
                    <a href="/bloguify/userMenu/criarCategoria" class="nav-link">Criar Categoria</a>
                </li>
                <li>
                    <a href="/bloguify/userMenu/criarUsuario" class="nav-link">Criar Usuário</a>
                </li>
            </ul>
            <button class="btn_sair" onclick="window.location='/bloguify/login/sair'">Sair</button>
        </div>
        <div class="content">
            <?php
            if (isset($view)) {
                $this->carregarViewNoTemplate($view, $this->dadosModel);
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script>
        function openEditModal(id, titulo, subtitulo, texto) {
            document.getElementById("edit_id").value = id;
            document.getElementById("edit_titulo").value = titulo;
            document.getElementById("edit_subtitulo").value = subtitulo;
            document.getElementById("edit_texto").value = texto;
            document.getElementById("editModal").style.display = "flex";
        }

        function closeEditModal() {
            document.getElementById("editModal").style.display = "none";
        }
    </script>

</body>

</html>