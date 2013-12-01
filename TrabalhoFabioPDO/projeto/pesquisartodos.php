<?php include 'header.php'; ?>

<?php

include('conexao.php');

try {
    $sql = "select * from pessoas order by nome";

    $instrucao = $conexao->prepare($sql);
    $instrucao->execute();
    $linhas = $instrucao->fetchAll();

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

    foreach($linhas as $linha) {
        if($linha['favorito'] == 'on')
        {
            echo '<tr">';
            echo '  <td style="padding: 6px 30px 6px 20px;">' . $linha['nome'] . "<br>" . '</td>';
            echo '  <td style="padding: 6px 30px 6px 20px;">' . $linha['data_nascimento'] . "<br>" . '</td>';
            echo '  <td style="padding: 6px 30px 6px 20px;">' . $linha['email'] . "<br>" . '</td>';
            echo '  <td style="padding: 6px 30px 6px 20px;">' . $linha['telefone'] . "<br>" . '</td>';
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
    echo ' <th style="padding: 6px 30px 6px 20px;">Todos</th>';
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
catch (PDOException $ex) {
    echo $ex->getMessage();
}

$conexao = null;

include 'footer.php'; ?>