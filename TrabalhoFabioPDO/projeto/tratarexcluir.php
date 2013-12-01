<?php include 'header.php'; ?>

<?php

include('conexao.php');

$sql = "delete from pessoas where id_pessoa = :id";
$dados = array('id' => $_GET['id']);

try {
    $instrucao = $conexao->prepare($sql);
    $instrucao->execute($dados);

    header('Location: index.php');
}
catch (PDOException $ex) {
    exit($ex->getMessage());
}

$conexao = null;

?>

<?php include 'footer.php'; ?>