<h1>
    Cadastre categorias para utilizar nos posts!
</h1>
<div class="criar_post">
    <form class="form_categoria"  action="/bloguify/userMenu/criarCategoriaAction" method="POST" enctype="multipart/form-data">
        <div class="inputs_categoria_e_usuario">
            <label for="titulo">Nome:</label>
            <input 
                class="form-control"
                type="text"
                name="nome"
                id="nome"
                required
            >   
        </div>
        <button class="botao_criacao" type="submit" class="btn btn-primary">
            Criar Categoria
        </button>
    </form>
</div>