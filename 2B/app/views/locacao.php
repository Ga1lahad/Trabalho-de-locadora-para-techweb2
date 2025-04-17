<link rel="stylesheet" href="/css/locacao.css">
<div id="main">
    <?php
    if ($_SESSION["auth"]["tipo"] == 1) {
        echo '<div>
        <form action="/locacao/cadastro" method="post">
            <label for="valor">Preço</label>
            <input type="number" step="0.1" name="valor" id="valor" required>
            <br>
            <label for="cliente">Selecione o Cliente por CPF</label>
            <select name="cliente" id="cliente" required>
                <option value="">Selecione</option>';
        foreach ($pessoas as $pessoa) {
            echo '<option value="' . $pessoa["id"] . '">' . $pessoa["cpf"] . '</option>';
        }
        echo '
            </select>
            <br>
            <label for="filme">Selecione o Filme</label>
            <select name="filme" id="filme" required>
                <option value="">Selecione</option>';
        foreach ($filmes as $filme) {
            echo '<option value="' . $filme->id . '">' . $filme->nome . '</option>';
        }
        echo '
            </select>
            <br>
            <button type="submit" value="submit">Alugar</button>
        </form>
    </div>';
    } ?>
    <span id="lista">
        <table>
            <tr>
                <th class="marcado">CPF do cliente</th>
                <th>Cliente</th>
                <th class="marcado">Filme</th>
                <th>Data de retirada</th>
                <th class="marcado">Data de entrega</th>
                <th>Valor</th>
                <?php if ($_SESSION["auth"]["tipo"] == 1) {echo '<th>Ação</th>';} ?>
            </tr>
            <?php
            if (!empty($lista)) {
                foreach ($lista as $row) {
                    echo '<tr id="' . $row->id . '">
                <td class="marcado">' . $row->cpf . '</td>
                <td>' . $row->cliente . '</td>
                <td class="marcado">' . $row->filme . '</td>
                <td>' . $row->emissao . '</td>
                <td class="marcado">' . $row->devolucao . '</td>
                <td>R$ ' . $row->valor . '</td>';
                    if ($_SESSION["auth"]["tipo"] == 1) {
                        $teste = $row->devolucao;
                        if (!isset($teste)) {
                            echo '<td class="marcado"><a href=/locacao/baixa?id=' . $row->id . '><button class="baixa">Entregue</button></a></td>';
                        } else {
                            echo '<td class="marcado">Ja entregue</td>';
                        }
                        echo '</tr>';
                    }
                }
            }
            ?>
        </table>
    </span>
</div>