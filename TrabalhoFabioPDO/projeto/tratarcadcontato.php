<?php
function ValidaData($dat){
	$data = explode("/","$dat");
	$d = $data[0];
	$m = $data[1];
	$y = $data[2];
 
    return checkdate($m,$d,$y);
}

?>

<?php

error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
header("Content-Type: text/html; charset=utf-8", true);

include('conexao.php');

$sql = "insert into pessoas (nome, data_nascimento, email, telefone, favorito)
values (:nome, :data_nascimento, :email, :telefone, :favorito)";

if(isset($_POST))
{
	$dados = array(
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
		echo	"<script language='JavaScript'>
				alert('Data de nascimento inválida');
				window.location.href='JavaScript:history.go(-1)';
				</script>";
		die();
	}
	
}

$conexao = null;

?>

