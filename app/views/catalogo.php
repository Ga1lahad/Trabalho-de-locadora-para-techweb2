<link rel="stylesheet" href="/css/catalogo.css">
<div id="main">
    <div id="pesquisa">
        <form action="" method="post">
            <input type="search" name="inpPesq" id="inpPesq" placeholder="Pesquise pelo seu filme aqui" onkeyup="pesquisa(inpPesq.value)">
            <button>
                <svg fill="#fdc221" height="1.9rem" width="2rem" version="1.1" id="Capa_1"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 490.4 490.4" xml:space="preserve">
                    <g>
                        <path
                            d="M484.1,454.796l-110.5-110.6c29.8-36.3,47.6-82.8,47.6-133.4c0-116.3-94.3-210.6-210.6-210.6S0,94.496,0,210.796 s94.3,210.6,210.6,210.6c50.8,0,97.4-18,133.8-48l110.5,110.5c12.9,11.8,25,4.2,29.2,0C492.5,475.596,492.5,463.096,484.1,454.796z M41.1,210.796c0-93.6,75.9-169.5,169.5-169.5s169.6,75.9,169.6,169.5s-75.9,169.5-169.5,169.5S41.1,304.396,41.1,210.796z">
                        </path>
                    </g>
                </svg>
            </button>
        </form>
    </div>
    <div id="catalogo">
        <?php
        foreach ($rs as $filme) {
            echo '<div class="filme">
            <img src="' . $filme->foto . '" alt="Foto do filme">
            <abbr
                title="' . $filme->sinopse . '">
                <h4>
                    ' . $filme->nome . '
                </h4>
                <p>' . $filme->estilo . '</p>
                <p>' . $filme->ano . ' - ' . $filme->duracao . 'min</p>
            </abbr>
        </div>';
        }
        ?>
    </div>
</div>
<script src="js/catalogo.js"></script>