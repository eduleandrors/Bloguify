
<div class="fale_conosco">
    <form class="form_faleconosco" action="/bloguify/home/enviarEmail" method="POST">
        <div class="form_faleconosco_inputs">
            <label for="nome">Seu nome(obrigatório)</label>
            <input type="text" name="nome" required>
        </div>

        <div class="form_faleconosco_inputs">
            <label for="email">Seu E-mail (obrigatório)</label>
            <input type="email" name="email" required>
        </div>

        <div class="form_faleconosco_inputs">
            <label for="assunto">Assunto:</label>
            <input type="text" name="assunto" required>
        </div>

        <div class="form_faleconosco_inputs">
            <label for="mensagem">Sua mensagem</label>
            <textarea name="mensagem"></textarea>
        </div>

        <button type="submit">Enviar</button>
    </form>
</div>