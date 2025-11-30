<?php 
if(session_status() === PHP_SESSION_NONE){
    session_start();
}
if(!isset($_SESSION['id_usuario'])){        
    header('Location: /projeto-bloguify/login');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="/projeto-bloguify/assets/styles/userMenu.css">
    <link href="https://fonts.googleapis.com/css2?family=Stack+Sans+Text:wght@200..700&display=swap" rel="stylesheet">
    <title>Seu espaço</title>
</head>
<body>
    
    <div class="sidebar d-flex flex-column p-3">
        <h4 class="text-dark">Dashboard admin</h4>
        <hr class="text-dark">
        <ul class="nav nav-pilsls flex-column mb-auto">
            <li>
                <a href="/projeto-bloguify/userMenu/criarPost" class="nav-link">Criar Post</a>
            </li>
            <li>
                <a href="/projeto-bloguify/userMenu/listarPosts" class="nav-link">Listar Posts</a>
            </li>
            <li>
                <a href="/projeto-bloguify/userMenu/criarCategoria" class="nav-link">Criar Categoria</a>
            </li>
        </ul>
        <button onclick="window.location='/projeto-bloguify/login/sair'">Sair</button>
    </div>
    <div class="content">
        <?php 
            if(isset($view)){
                $this->carregarViewNoTemplate($view, $this->dadosModel);
            }
        ?>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script>
    
function openEditModal(id, titulo, subtitulo) {
    document.getElementById("edit_id").value = id;
    document.getElementById("edit_titulo").value = titulo;
    document.getElementById("edit_subtitulo").value = subtitulo;

    document.getElementById("editModal").style.display = "flex";
}

function closeEditModal() {
    document.getElementById("editModal").style.display = "none";
}
</script>

</body>
</html>
