<link rel="stylesheet" href="/css/incluir.css">
<div id="main">
    <form action="" class="form" method="POST">
        <label for="nome">Nome</label>
        <input id="nome" name="nome" type="text">
        <label for="ano">Ano</label>
        <input id="ano" name="ano" type="text">
        <label for="duracao">Duracao</label>
        <input id="duracao" name="duracao" type="number">
        <label for="foto">Url da imagen</label>
        <input id="foto" name="foto" type="text">
        <label for="sinopse">Sinopse</label>
        <input id="sinopse" name="sinopse" type="text">
        <br>
        <div>
            <select name="estilo" id="estilo">
                <?php
                foreach ($estiloDao->listarTodos() as $row) {
                    echo '<option value="' . $row->id . '">' . $row->nome . '</option>';
                }
                ?>
            </select>
        </div>
        <br>
        <input name="submit" type="submit">
    </form>
    <form action="" class="form" method="POST">
        <fieldset>
            <legend>
                Cadastro de estilos
            </legend>
            <label for="nome">Nome</label>
            <input id="nome" name="nome" type="text">
            <br>
            <input name="submit-est" type="submit">
        </fieldset>
    </form>
</div>