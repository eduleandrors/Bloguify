<?php 
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
    <link rel="stylesheet" href="/projeto-bloguify/assets/styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Stack+Sans+Text:wght@200..700&display=swap" rel="stylesheet">
    <title>Seu espaço</title>
    <style>
        body{
            min-height: 100vh;
            display: flex;
        }
        .sidebar{
            width: 250px;
            background-color: blue;
        }
        .sidebar .navlink.active{
            background-color: blue;
        }
        .content{
            padding: 30px;
        }
    </style>
</head>
<body>
    
    <div class="sidebar d-flex flex-column p-3">
        <h4 class="text-dark">Dashboard admin</h4>
        <hr class="text-dark">
        <ul class="nav nav-pilsls flex-column mb-auto">
            <li>
                <a href="#" class="nav-link active">Teste</a>
            </li>
        </ul>
    </div>
    
    <div class="content">
        <h1>UHUUU LOGOU</h1>
        <button onclick="window.location='/projeto-bloguify/login/sair'">Sair</button>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
