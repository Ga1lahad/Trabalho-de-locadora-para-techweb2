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
