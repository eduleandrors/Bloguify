<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="copyright" content="© 2025 Bloguify. Todos os direitos reservados">
    <meta name="author" content="Eduardo Leandro">
    <meta name="plagiarism-policy" content="Este conteúdo é protegido e não pode ser copiado sem permissão">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="/bloguify/assets/styles/home.css">
    <link href="https://fonts.googleapis.com/css2?family=Stack+Sans+Text:wght@200..700&display=swap" rel="stylesheet">
    <title>Home</title>
</head>
<body class="d-flex flex-column min-vh-100">

<!-- CABEÇALHO MENU -->

    <header class="p-3 text-white" style="background-color: #0a3669ff;">
        <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a class="navbar-brand" href="#">
            <img src="/bloguify/assets/img/bloguify.png" alt="Logo Bloguify" width="150" height="34" class="me-5">
        </a>  
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="/bloguify" class="nav-link px-2 text-white">Início</a></li>
            <li><a href="/bloguify/home/docs" class="nav-link px-2 text-white">Docs</a></li>
            <li><a href="/bloguify/home/faleConosco" class="nav-link px-2 text-white">Fale Conosco</a></li>
            <li><a href="/bloguify/home/sobreNos" class="nav-link px-2 text-white">Sobre nós</a></li>
            </ul>
            <div class="text-end">
            <button 
                type="button" 
                class="btn btn-outline-light me-2" 
                style="background-color: #1A83FE"
                data-bs-toggle="modal"
                data-bs-target="#modalTermos"
            >
                Entre
            </button>
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
                <img src="/bloguify/assets/img/bloguify.png" class="bi me-2" width="150" height="32" aria-hidden="true">
            </a> 
            <ul class="nav col-md-4 justify-content-end"> 
                <li class="nav-item">
                    <a href="/bloguify" class="nav-link px-2">Início</a>
                </li>  
                <li class="nav-item">
                    <a href="/bloguify/home/docs" class="nav-link px-2">Docs</a>
                </li>
                <li class="nav-item">
                    <a href="/bloguify/home/faleConosco" class="nav-link px-2">Fale Conosco</a>
                </li> 
                <li class="nav-item">
                    <a href="/bloguify/home/sobreNos" class="nav-link px-2">Sobre nós</a>
                </li> 
            </ul> 
        </footer> 
    </div>

    <!-- MODAL DE TERMOS DE SERVIÇO -->
<div class="modal fade" id="modalTermos" tabindex="-1" aria-labelledby="modalTermosLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="modalTermosLabel">Termos de Serviço</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
            <h6>1. Termos de Serviço</h6>
            <ul>
            <li>O <strong>Bloguify</strong> é uma plataforma para criação, publicação e gerenciamento de posts.</li>
            <li>Você concorda em fornecer informações verdadeiras e manter sua conta segura.</li>
            <li>Não é permitido utilizar o Bloguify para atividades ilegais ou ofensivas.</li>
            <li>O usuário é responsável pelo conteúdo que publica. O Bloguify não se responsabiliza por informações incorretas ou ilegais postadas por usuários.</li>
            <li>Posts podem ser removidos ou contas suspensas caso violem estes termos.</li>
            <li>O Bloguify pode alterar estes termos a qualquer momento, sendo recomendável consultá-los periodicamente.</li>
            </ul>

        <h6>2. Política de Plágio</h6>
        <ul>
            <li>Todos os conteúdos publicados devem ser originais ou devidamente autorizados pelo autor.</li>
            <li>É proibido copiar textos, imagens ou qualquer conteúdo de terceiros sem permissão.</li>
            <li>Posts que violarem direitos autorais ou forem plagiados podem ser removidos imediatamente.</li>
            <li>Usuários que repetidamente publicarem conteúdo plagiado poderão ter a conta suspensa ou removida.</li>
            <li>O Bloguify reserva-se o direito de tomar medidas legais caso haja violação grave de direitos autorais.</li>
        </ul>

        <div class="form-check mt-3">
          <input class="form-check-input" type="checkbox" id="aceitarTermos">
          <label class="form-check-label" for="aceitarTermos">
            Eu li e aceito os Termos de Serviço e a Política de Plágio.
          </label>
        </div>
      </div>

      <div class="modal-footer">
        <button id="btnContinuar" class="btn btn-primary" disabled>Continuar</button>
      </div>

    </div>
  </div>
</div>
<script>
document.getElementById('aceitarTermos').addEventListener('change', function () {
    document.getElementById('btnContinuar').disabled = !this.checked;
});

document.getElementById('btnContinuar').addEventListener('click', function () {
    window.location = '/bloguify/login';
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>