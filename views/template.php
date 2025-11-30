<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="/projeto-bloguify/assets/styles/home.css">
    <link href="https://fonts.googleapis.com/css2?family=Stack+Sans+Text:wght@200..700&display=swap" rel="stylesheet">
    <title>Home</title>
</head>
<body class="d-flex flex-column min-vh-100">

<!-- CABEÇALHO MENU -->

    <header class="p-3 text-white" style="background-color: #0a3669ff;">
        <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a class="navbar-brand" href="#">
            <img src="/projeto-bloguify/assets/img/bloguify.png" alt="Logo Bloguify" width="150" height="34" class="me-5">
        </a>  
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="/projeto-bloguify" class="nav-link px-2 text-white">Início</a></li>
            <li><a href="/projeto-bloguify/home/docs" class="nav-link px-2 text-white">Docs</a></li>
            <li><a href="/projeto-bloguify/home/faleConosco" class="nav-link px-2 text-white">Fale Conosco</a></li>
            <li><a href="/projeto-bloguify/home/sobreNos" class="nav-link px-2 text-white">Sobre nós</a></li>
            </ul>
            <div class="text-end">
            <button onclick="window.location='/projeto-bloguify/login'" type="button" class="btn btn-outline-light me-2" style="background-color: #1A83FE">Entre</button>
            <button onclick="window.location='/projeto-bloguify/login/cadastro'"v type="button" class="btn btn-outline-light me-2">Cadastre-se</button>
            </div>
        </div>
        </div>
    </header>

    <div class="flex-fill">
        <?php 
            if(isset($view)){
                $this->carregarViewNoTemplate($view);
            }
        ?>
    </div>


<!-- FOOTER MENU -->
    <div class="footer_container" style="background-color: #0a3669ff;">
        <footer class="container-fluid d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top text-white" style="background-color: #0a3669ff;"> 
            <p class="col-md-4 mb-0">© 2025 Company, Inc</p> 
            <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none" aria-label="Bootstrap"> 
                <img src="/projeto-bloguify/assets/img/bloguify.png" class="bi me-2" width="150" height="32" aria-hidden="true">
            </a> 
            <ul class="nav col-md-4 justify-content-end"> 
                <li class="nav-item">
                    <a href="/projeto-bloguify" class="nav-link px-2">Início</a>
                </li>  
                <li class="nav-item">
                    <a href="/projeto-bloguify/home/docs" class="nav-link px-2">Docs</a>
                </li>
                <li class="nav-item">
                    <a href="/projeto-bloguify/home/faleConosco" class="nav-link px-2">Fale Conosco</a>
                </li> 
                <li class="nav-item">
                    <a href="/projeto-bloguify/home/sobreNos" class="nav-link px-2">Sobre nós</a>
                </li> 
            </ul> 
        </footer> 
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>