<link rel="stylesheet" href="css/login.css">
<div id="main">
    <form class="campos" action="\cadastrar" method="post">
        <label for="nome">Nome</label>
        <input required require name="nome" id="nome" type="text">
        <label for="endereco">Endereco</label>
        <input required name="endereco" id="endereco" type="text">
        <label for="telefone">Telefone</label>
        <input required name="telefone" id="telefone" type="numero">
        <label for="cpf">CPF</label>
        <input required name="cpf" id="cpf" type="text">
        <label for="senha">Senha</label>
        <input required name="senha" id="senha" type="password">
        <label for="rptsenha">Repita a Senha</label>
        <input required name="rptsenha" id="rptsenha" type="password" onkeyup="teste()">
        <?php
        if (isset($_SESSION["auth"]) && $_SESSION["auth"]["tipo"] == 1) {
            echo '
        <div>
            <label for="tipo">Funcionario</label>
            <input name="tipo" id="tipo" type="checkbox" onkeyup="teste()">
        </div>';
        }
        ?>
        <br>
        <a id="alter" href="\login">Login</a>
        <br>
        <input name="cadastro" type="submit">
    </form>

</div>
<script src="js/login.js"></script>