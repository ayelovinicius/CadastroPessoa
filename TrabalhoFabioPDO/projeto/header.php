<!DOCTYPE html>
<html>
<head>
	<!-- META -->
	<title>Contatos</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="description" content="" />
	
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../99lime/css/kickstart.css" media="all" />
	<link rel="stylesheet" type="text/css" href="../99lime/style.css" media="all" /> 
	
	<!-- Javascript -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="../99lime/js/kickstart.js"></script>

	<script type="text/javascript" src="../99lime/js/jquery.js"></script>
	
	<script type="text/javascript" src="../99lime/js/jquery.meio.mask.js"></script>

</head>
<body>

<!-- Menu Horizontal -->
<ul class="menu">
<li class="current"><a href="index.php">Início</a></li>
<li><a href=""><i class="icon-user"></i> Contato</a>
<ul>
	<li><a href="cadcontato.php"><i class="icon-plus-sign"></i> Cadastrar</a></li>
	<li><a href="alterar.php"><i class="icon-refresh"></i> Alterar</a>
	<li><a href="excluir.php"><i class="icon-remove"></i> Excluir</a>
	<li><a href="alterarexcluir.php"><i class="icon-random"></i> Ambos</a>
</ul>
</li>
<li><a href=""><i class="icon-search"></i> Pesquisar</a>
	<ul>
	<li><a href="pesquisarnome.php"><i class="icon-zoom-out"></i> Por nome</a></li>
	<li><a href="pesquisartodos.php"><i class=" icon-zoom-in"></i> Listar Todos</a>
	</ul>
</li>
</ul>

<?php 
error_reporting(E_ALL & ~E_NOTICE);
?>