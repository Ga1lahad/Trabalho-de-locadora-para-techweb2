<?php
foreach ($rs as $filme) {
    echo '<div class="filme">
            <img src="' . $filme->getFoto() . '" alt="Foto do filme">
            <abbr
                title="' . $filme->getSinopse() . '">
                <h4>
                    ' . $filme->getNome() . '
                </h4>
                <p>' . $filme->getEstilo()->getNome() . '</p>
                <p>' . $filme->getAno() . ' - ' . $filme->getDuracao() . 'min</p>
            </abbr>
        </div>';
}
