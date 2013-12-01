<?php
function ValidaData($dat){
    $data = explode("/","$dat");
    $d = $data[0];
    $m = $data[1];
    $y = $data[2];
 
    return checkdate($m,$d,$y);
}

?>

<?php include 'header.php'; ?>
<?php

include('conexao.php');

$sql = "update pessoas set nome = :nome, data_nascimento = :data_nascimento, email = :email, telefone = :telefone, favorito = :favorito where id_pessoa = :id";

$dados = array(
    'id' => $_GET['id'],
    'nome' => $_POST['nome'],
    'data_nascimento' => $_POST['data_nascimento'],
    'email' => $_POST['email'],
    'telefone' => $_POST['telefone'],
    'favorito' => $_POST['favorito']);

if(ValidaData($_POST['data_nascimento']) == 1)
    {
        try {
        $instrucao = $conexao->prepare($sql);
        $instrucao->execute($dados);

        header('Location: index.php');
        }
        catch (PDOException $ex) {
            exit($ex->getMessage());
        }
    }

    else
    {
        echo    "<script language='JavaScript'>
                alert('Data de nascimento inválida');
                window.location.href='JavaScript:history.go(-1)';
                </script>";
        die();
    }

    $conexao = null;

?>

<?php include 'footer.php'; ?>