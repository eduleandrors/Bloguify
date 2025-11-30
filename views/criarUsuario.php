<h1>
    Cadastre usuários para utilização do Bloguify!
</h1>
<form class="form_usuario" action="/bloguify/userMenu/criarUsuarioAction" method="POST">
    <div class="inputs_categoria_e_usuario">
        <label for="email">Nome</label>
        <input
            type="text"
            name="name"
            id="name"
            class="form-control"
            required>
    </div>
    <div class="inputs_categoria_e_usuario">
        <label for="email">Email</label>
        <input
            type="email"
            name="email"
            id="email"
            class="form-control"
            required>
    </div>

    <div class="inputs_categoria_e_usuario">
        <label for="password">Senha</label>
        <input
            type="password"
            name="password"
            id="password"
            class="form-control"
            required>
    </div>

    <button type="submit" class="botao_criacao">
        Cadastrar
    </button>
</form>