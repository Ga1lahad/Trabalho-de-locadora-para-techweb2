<link rel="stylesheet" href="/css/locacao.css">
<div id="main">
    <?php
    if ($_SESSION["auth"][0]->getTipo() == "1") {
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
            echo '<option value="' . $filme->getId() . '">' . $filme->getNome() . '</option>';
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
                <?php if ($_SESSION["auth"][0]->getTipo(0) == "1") {
                    echo '<th>Ação</th>';
                } ?>
            </tr>
            <?php
            if (!empty($lista)) {
                foreach ($lista as $row) {
                    // if ($row->getDevolucao() !== null) {
                    //     var_dump($row->getDevolucao());
                    // }
                    echo '<tr id="' . $row->getId() . '">
                <td class="marcado">' . $row->getCliente()->getCpf() . '</td>
                <td>' . $row->getCliente()->getNome() . '</td>
                <td class="marcado">' . $row->getFilme()->getNome() . '</td>
                
                <td>' . $row->getEmissao()->format('d-m-Y H:i') . '</td>
                <td class="marcado">' . $row->getDevolucao()->format('d-m-Y H:i') . '</td>
                <td>R$ ' . $row->getValor() . '</td>';
                    if ($_SESSION["auth"][0]->getTipo(0) == "1") {
                        $teste = $row->getDevolucao()->format('d-m-Y H:i');
                        if (!isset($teste)) {
                            echo '<td class="marcado"><a href=/locacao/baixa?id=' . $row->getId() . '><button class="baixa">Entregue</button></a></td>';
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