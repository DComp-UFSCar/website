    <?php 
        if ($_SESSION["adm"] == 1){
        	$profs = $db->select("SELECT nome FROM professor"); 

        ?>

        <form action = "profConfig.php" method = "post">
        <br>
        Nome: <select name = "prof">
          <?php foreach ($profs as $value) { ?>
            <option value = "<?= $value['nome'] ?>"><?= $value['nome'] ?></option>
          <?php } ?>
        </select>  
        <input type = "submit" name = "selecionar" value = "selecionar">-<input type = "submit" name = "excluir" value = "excluir">
      </form>
      <?php } ?>

      <form action = "../new-dao/editarProf.php" method = "POST" enctype="multipart/form-data">
        <br>
        <table>
        	<tr>
	      		<td>Foto:</td> 
	      		<td><img src="../fotos-professores/<?= $prof[0]['foto'] ?>" heigth = "90" width = "70">
	      			<input type ="file" name = "fileToUpload" id = "fileToUpload">
	      		</td>
	      	</tr>
	      	<tr>
	        	<td>Nome:</td> 
	        	<td><input type = "text" name = "nome" value = "<?= $prof[0]['nome'] ?>"></td>
	        </tr>
	        <tr>
	        	<td>Nome do Usuario :</td>
	        	<td><input type = "text" name = "user" value = "<?= $user[0]['usuario'] ?>"></td>
	        </tr>
	        <tr>
	        	<td>Pagina Pessoal : </td>
	        	<td><input type = "text" name = "pagina" value = "<?= $prof[0]['paginaPessoal'] ?>" size = "35"></td>
	        </tr>
	        <tr>
	        	<td>Area de Atuação : </td>
	        	<td><input type = "text" name = "area" value = "<?= $prof[0]['area'] ?>" size ="60"></td>
	        </tr>
	        <tr>
	        	<td>Senha : </td>
	        	<td><input type = "text" name = "senha" value = "<?= $user[0]['senha'] ?>"></td>
	        </tr>
	        <?php if ($_SESSION["adm"] == 1){ ?>
	        <tr>
	        	<td>Administrador : </td>
	        	<?php if ($user[0]["adm"] == 0){ ?>
	        		<td><input type = "checkbox" name = "adm" value = "1"></td>
	        	<?php }else{ ?>
	        		<td><input type = "checkbox" name = "adm" value = "1" checked></td>
	        	<?php } ?>
	        </tr>
	        <?php } ?>
	        <tr>
	        	<td></td>
	        	<td align = "right"><input type = "submit" name = "editar" value = "editar"></td>
	        </tr>
        </table>
      </form> 