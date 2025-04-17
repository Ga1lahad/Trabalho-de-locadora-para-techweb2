<link rel="stylesheet" href="css/login.css">
<div id="main">
    <form class="campos" action="\logar" method="post">
        <label for="cpf">CPF</label>
        <input required name="cpf" id="cpf" type="text">
        <label for="senha">Senha</label>
        <input required name="senha" id="senha" type="password">
        <br>
        <a id="alter" href="\cadastro">Cadastrar</a>
        <br>
        <input name="login" type="submit">
    </form>
</div>
<script src="js/login.js"></script>