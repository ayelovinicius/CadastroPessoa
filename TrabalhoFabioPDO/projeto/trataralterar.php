<?php include 'header.php'; ?>

<?php
include('conexao.php');

try {

    $sql = "select * from pessoas where id_pessoa like :id order by nome";

    $instrucao = $conexao->prepare($sql);
    $dados = array('id' => $_GET['id']);
    $instrucao->execute($dados);
    $linhas = $instrucao->fetchAll();

    foreach($linhas as $linha) {

?>

<form method="post" action="trataralterarupdate.php?id=<?php echo $_GET['id'] ?>">
    <script type="text/javascript">
        jQuery(function($){
            $("#data_nascimento").setMask("99/99/9999");
            $("#telefone").setMask("(99) 999999999");
        });
    </script>

    <div class="grid">
        <div class="col_5" style="margin-top:40px;">
            <label for="nome">Nome*:</label>
            <input id="nome" type="text" name="nome" class="col_10" placeholder="Nome" value="<?php echo $linha['nome'] ?>" required />
        </div>

        <div class="col_7" style="margin-top:40px;">
            <label for="data_nascimento">Data de Nascimento:</label>
            <input id="data_nascimento" type="text" name="data_nascimento" class="col_3" placeholder="Data Nascimento" value="<?php echo $linha['data_nascimento'] ?>" />
        </div>
        
        <br><br>

        <hr class="alt1" />
        
        <div class="col_5">
            <label for="email">Email:</label>
            <input id="email" type="text" name="email" class="col_10" placeholder="Email" value="<?php echo $linha['email'] ?>" />
        </div>
        
        <div class="col_7">
            <label for="telefone">Telefone:</label>
            <input id="telefone" type="text" name="telefone" class="col_4" placeholder="Telefone" value="<?php echo $linha['telefone'] ?>" />
        </div>

        <br><br>

        <hr class="alt1" />
        
        <div class="col_5" style="margin-botton:40px;">
            <input type="checkbox" id="favorito" name="favorito"  <?php if($_linha['favorito'] == 'on') {echo 'checked="true"';} ?> />
            <label for="favorito" class="inline">Favorito</label>
        </div>

        <div class="col_7" style="margin-botton:40px;">
            <button class="blue" type="submit"><i name="Enviar" class="icon-refresh"></i> Alterar</button>
        </div>

        <br><br>
        <br><br>

        <?php 

    }
        }
        catch (PDOException $ex) {
            echo $ex->getMessage();
        }

        $conexao = null;
        ?>
</form>

</div> <!-- End Grid -->
</form>

<?php include 'footer.php'; ?>