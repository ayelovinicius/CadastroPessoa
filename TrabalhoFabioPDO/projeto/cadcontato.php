<!DOCTYPE html>
<?php include 'header.php'; ?>
	<script type="text/javascript">
		jQuery(function($){
			$("#data_nascimento").setMask("99/99/9999");
			$("#telefone").setMask("(99) 999999999");
		});
	</script>
<form action="tratarcadcontato.php" method="post">
<div class="grid">
	<div class="col_5" style="margin-top:40px;">
		<label for="nome">Nome*:</label>
		<input id="nome" type="text" name="nome" class="col_10" placeholder="Nome" required />
	</div>

	<div class="col_7" style="margin-top:40px;">
		<label for="data_nascimento">Data de Nascimento:</label>
		<input id="data_nascimento" type="text" name="data_nascimento" class="col_3" placeholder="Data Nascimento" />
	</div>
	
	<br><br>

	<hr class="alt1" />
	
	<div class="col_5">
		<label for="email">Email:</label>
		<input id="email" type="text" name="email" class="col_10" placeholder="Email" />
	</div>
	
	<div class="col_7">
		<label for="telefone">Telefone:</label>
		<input id="telefone" type="text" name="telefone" class="col_4" placeholder="Telefone" />
	</div>

	<br><br>

	<hr class="alt1" />
	
	<div class="col_5" style="margin-botton:40px;">
		<input type="checkbox" id="favorito" name="favorito" />
		<label for="favorito" class="inline">Favorito</label>
	</div>

	<div class="col_7" style="margin-botton:40px;">
		<button class="medium green" type="submit"><i name="Enviar" class="icon-plus-sign"></i>  Cadastrar</button>
	</div>

	<br><br>

	<hr class="alt1" />

</form>

</div> <!-- End Grid -->
<?php include 'footer.php'; ?>