<?php include 'header.php'; ?>

<form method="post" action="pesquisarnome.php">
    <input type="text" class="col_4" name="q" style="margin:40px 20px;" placeholder="Digite o nome a ser pesquisado">
    <input type="submit" style="margin:40px 20px;" value="Buscar">
</form>

<?php

include('conexao.php');

try {
    $sql = "select * from pessoas where nome like :q order by nome";
    $sql2 = "select * from pessoas order by nome";

    $q = isset($_POST['q']) ? $_POST['q'] : '';

    if($q != '')
    {
        $instrucao = $conexao->prepare($sql);
        $dados = array('q' => $q.'%');
        $instrucao->execute($dados);
        $linhas = $instrucao->fetchAll();

        $instrucao2 = $conexao->prepare($sql2);
        $instrucao2->execute();
        $linhas2 = $instrucao2->fetchAll();

        echo '<table>';

        echo '<tr>';
        echo '  <th> <hr class="alt1" /> </th>';
        echo '  <th> <hr class="alt1" /> </th>';
        echo '  <th> <hr class="alt1" /> </th>';
        echo '  <th> <hr class="alt1" /> </th>';
        echo '</tr>';

        echo '<tr>';
        echo ' <th style="padding: 6px 30px 6px 20px;">Favoritos</th>';
        echo '</tr>';

        echo '<tr>';
        echo ' <th style="padding: 6px 30px 6px 20px;">Nome</th>';
        echo ' <th style="padding: 6px 30px 6px 20px;">Data de Nascimento</th>';
        echo ' <th style="padding: 6px 30px 6px 20px;">Email</th>';
        echo ' <th style="padding: 6px 30px 6px 20px;">Telefone</th>';
        echo '</tr>';

        foreach($linhas2 as $linha2) {
            if($linha2['favorito'] == 'on')
            {
                echo '<tr">';
                echo '  <td style="padding: 6px 30px 6px 20px;">' . $linha2['nome'] . "<br>" . '</td>';
                echo '  <td style="padding: 6px 30px 6px 20px;">' . $linha2['data_nascimento'] . "<br>" . '</td>';
                echo '  <td style="padding: 6px 30px 6px 20px;">' . $linha2['email'] . "<br>" . '</td>';
                echo '  <td style="padding: 6px 30px 6px 20px;">' . $linha2['telefone'] . "<br>" . '</td>';
                echo '</tr>';
            }
        }

        echo '<tr>';
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
            echo '</tr>';
        }

        echo '<tr>';
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

include 'footer.php'; ?>