<h1>
    TELA DE CRIAÇÃO DOS POSTS
</h1>
<?php 
require_once __DIR__ . '/../models/Conexao.php';

// Busca categorias
$stmt = Conexao::getConexao()->query("SELECT * FROM categoria ORDER BY nome ASC");
$categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = Conexao::getConexao()->query("SELECT * FROM users ORDER BY name ASC");
$autores = $sql->fetchAll(PDO::FETCH_ASSOC);


?>
    <form class="form_criar_post" action="/bloguify/userMenu/criarPostAction" method="POST" enctype="multipart/form-data">
        <div class="form_container">
            <div class="form_inputs_1">
                <div class="form_inputs_containers">
                    <label for="titulo">Título:</label>
                    <input
                        type="text"
                        name="titulo"
                        id="titulo"
                        required
                    >
                </div>
                <div class="form_inputs_containers">
                    <label for="subtitulo">Subtítulo:</label>
                    <input
                        type="text"
                        name="subtitulo"
                        id="subtitulo"
                        required
                    >
                </div>
                <div class="form_inputs_containers">
                    <label for="imagem">Imagem da capa</label>
                    <input
                        type="file"
                        name="imagem"
                        accept="image/*"
                        required>
                </div>
                <div class="form_input_textarea">
                    <label for="texto">Texto:</label>
                    <textarea
                        name="texto"
                        id="texto"
                        rows="8"
                        required
                    ></textarea>
                    <button type="button" id="btnRevisar" class="btn btn-secondary">
                        Revisar texto com IA
                    </button>
                </div>
            </div>
            <div class="form_inputs_2">
                <div class="form_inputs_containers">
                    <label for="categorias">Categorias (máx. 3):</label>
                    <select name="categorias[]" id="categorias" multiple size="3" required>
                        <?php foreach($categorias as $cat): ?>
                            <option value="<?= $cat['id_categoria'] ?>"><?=$cat['nome']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form_inputs_containers">
                    <label for="autores">Autores (máx. 3):</label>
                    <select name="autores[]" id="autores" multiple size="3" required>
                        <?php foreach($autores as $autor): ?>
                            <option value="<?= $autor['id_user'] ?>"><?=$autor['name']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <button type="submit" class="botao_criar_post">
        Criar Post
        </button>
    </form>
    <div id="modalIA" class="modal">
    <div class="modal-content">
        <span id="fecharModal" class="fechar">&times;</span>

        <h3>Texto Revisado</h3>
        <div id="textoRevisadoModal"></div>

        <button id="btnCopiarModal" class="btn btn-secondary" style="margin-top:15px;">
            Copiar texto revisado
        </button>
    </div>
</div>
<script>
    $botaoRevisar = document.getElementById('btnRevisar');

$botaoRevisar.addEventListener('click', function() {

    const texto = document.getElementById('texto').value;
    if (!texto.trim()) {
        alert("Digite um texto antes!");
        return;
    }

    fetch('/bloguify/ia/revisarTexto', {
        method: 'POST',
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "texto=" + encodeURIComponent(texto)
    })
    .then(res => res.json())
    .then(data => {

        // Abrir modal
        const modal = document.getElementById("modalIA");
        modal.style.display = "flex";

        // Inserir texto
        document.getElementById("textoRevisadoModal").innerText = data.revisado;

        // Botão copiar dentro do modal
        document.getElementById("btnCopiarModal").onclick = function () {

            navigator.clipboard.writeText(data.revisado)
                .then(() => {
                    alert("Texto copiado!");
                    modal.style.display = "none";
                });
        };

        // Botão fechar
        document.getElementById("fecharModal").onclick = function () {
            modal.style.display = "none";
        };

    })
    .catch(err => {
        alert("Erro ao conectar com a IA.");
    });
});

</script>
