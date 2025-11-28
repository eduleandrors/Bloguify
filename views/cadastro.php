<h1>
    TESTE TELA DE CADASTRO
</h1>
<form action="/projeto-bloguify/login/cadastrar" method="POST">
    <div class="mb-3">
        <label for="email">Nome</label>
        <input 
            type="text" 
            name="name" 
            id="name" 
            class="form-control" 
            required
        >
    </div>
    <div class="mb-3">
        <label for="email">Email</label>
        <input 
            type="email" 
            name="email" 
            id="email" 
            class="form-control" 
            required
        >
    </div>

    <div class="mb-3">
        <label for="password">Senha</label>
        <input 
            type="password" 
            name="password" 
            id="password" 
            class="form-control" 
            required
        >
    </div>

    <button type="submit" class="btn btn-primary">
        Cadastrar
    </button>
</form>