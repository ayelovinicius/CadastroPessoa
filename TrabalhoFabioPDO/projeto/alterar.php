<?php include 'header.php'; ?>

<form method="post" action="alterar.php">
    <input type="text" class="col_4" name="q" style="margin:40px 20px;" placeholder="Digite o nome que deseja Alterar">
    <input type="submit" style="margin:40px 20px;" value="Buscar">
</form>

<?php

include('conexao.php');

try {
    $sql = "select * from pessoas where nome like :q order by nome";

    $q = isset($_POST['q']) ? $_POST['q'] : '';

    if($q != '')
    {
        $instrucao = $conexao->prepare($sql);
        $dados = array('q' => $q.'%');
        $instrucao->execute($dados);
        $linhas = $instrucao->fetchAll();

        echo '<table>';

        echo '<tr>';
        echo '  <th> <hr class="alt1" /> </th>';
        echo '  <th> <hr class="alt1" /> </th>';
        echo '  <th> <hr class="alt1" /> </th>';
        echo '  <th> <hr class="alt1" /> </th>';
        echo '  <th> <hr class="alt1" /> </th>';
        echo '</tr>';

        echo '<tr>';
        echo ' <th style="padding: 6px 30px 6px 20px;">Pesquisa</th>';
        echo '</tr>';

        echo '<tr>';
        echo ' <th style="padding: 6px 30px 6px 20px;">Nome</th>';
        echo ' <th style="padding: 6px 30px 6px 20px;">Data de Nascimento</th>';
        echo ' <th style="padding: 6px 30px 6px 20px;">Email</th>';
        echo ' <th style="padding: 6px 30px 6px 20px;">Telefone</th>';
        echo '</tr>';

        foreach($linhas as $linha) {
            echo '<tr">';
            echo '  <td style="padding: 6px 30px 6px 20px;">' . $linha['nome'] . "<br>" . '</td>';
            echo '  <td style="padding: 6px 30px 6px 20px;">' . $linha['data_nascimento'] . "<br>" . '</td>';
            echo '  <td style="padding: 6px 30px 6px 20px;">' . $linha['email'] . "<br>" . '</td>';
            echo '  <td style="padding: 6px 30px 6px 20px;">' . $linha['telefone'] . "<br>" . '</td>';
            ?>
            <td style="padding: 6px 30px 6px 20px;"> <button type="button" class="medium blue icon-refresh" onclick="window.location.href='trataralterar.php?id=<?php echo $linha['id_pessoa'] ?>'">  Alterar</button> </td>
            <?php
            echo '</tr>';
        }

        echo '<tr>';
        echo '  <th> <hr class="alt1" /> </th>';
        echo '  <th> <hr class="alt1" /> </th>';
        echo '  <th> <hr class="alt1" /> </th>';
        echo '  <th> <hr class="alt1" /> </th>';
        echo '  <th> <hr class="alt1" /> </th>';
        echo '</tr>';

        echo '</table>';
    }
    
}
catch (PDOException $ex) {
    echo $ex->getMessage();
}

$conexao = null;

?>

<?php include 'footer.php'; ?>
