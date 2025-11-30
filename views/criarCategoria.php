<h1>
    TELA DE CRIAÇÃO DAS CATEGORIAS
</h1>
<div class="criar_post">
    <form action="/projeto-bloguify/userMenu/criarCategoriaAction" method="POST" enctype="multipart/form-data">
        <div>
            <label for="titulo">Nome:</label>
            <input 
                type="text"
                name="nome"
                id="nome"
                required
            >   
        </div>
        <button type="submit" class="btn btn-primary">
            Criar Categoria
        </button>
    </form>
</div>