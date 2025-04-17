   <?php
    ?>
   <nav id="navbar">
       <div class="opcoes">
           <a href="/">Catalogo</a>
           <?php
            if (isset($_SESSION["auth"]) && $_SESSION["auth"]) {
                echo '<a href="/locacao">Locações</a>';
            } else {
                echo '<a class="disable" href="/">Locações</a>';
            }
            ?>
       </div>
       <div class="opcoes">
           <?php
            if (isset($_SESSION["auth"][0]) && $_SESSION["auth"][0]->getTipo(0) == "1") {
                echo '<a href="/incluir">Cadastrar Filme</a>';
            } else {
                echo '<a class="disable" href="/">Cadastrar Filme</a>';
            }
            ?>
           <a href="/login">Entrar</a>
       </div>
   </nav>