<!DOCTYPE html>
<html>
<head>
  <?php include "header.php"; ?>
</head>
<body>
  <?php 
  session_start();
  require("db.php");

  $db = new Db();
  $id = $_GET['id'];

  $mat = $db->selectOne("SELECT * FROM materia WHERE id = ".$id);

  $menuSelected = 5; include "menu.php" ?>
  <div id="content">
    <header>Controle <?php include "login.php" ?> </header>
    <div id="main-content">
      <form action = "new-dao/editarMat.php?id=<?= $id ?>" method = "POST" enctype="multipart/form-data">
        <br>
        <table style = "width: 60%">
	      	<tr>
	        	<td>Nome :</td> 
	        	<td><input type = "text" name = "nome" value = "<?= $mat['nome'] ?>"></td>
	        </tr>
	        <tr>
	        	<td>Codigo : </td>
	        	<td><input type = "text" name = "codigo" value = "<?= $mat['codigoEscolar'] ?>"></td>
	        </tr>
	        <tr>
	        	<td>Abreviação : </td>
	        	<td><input type = "text" name = "abrev" value = "<?= $mat['abrev'] ?>"></td>
	        </tr>
	        <tr>
	        	<td>Creditos Teoricos : </td>
	        	<td><input type = "number" name = "crT" value = "<?= $mat['nCreditosTeoricos'] ?>"></td>
	        </tr>
	        <tr>
	        	<td>Creditos Praticos : </td>
	        	<td><input type = "number" name = "crP" value = "<?= $mat['nCreditosPraticos'] ?>"></td>
	        </tr>
	        <tr>
	        	<td>Perfil : </td>
	        	<td><input type = "number" name = "perfil" value = "<?= $mat['perfil'] ?>"></td>
	        </tr>
	        <tr>
	      		<td>Nucleo :</td> 
	      		<td>
					<select name = "nucleo">
          				<?php
          				$nucAtual = $db->selectOne("SELECT nome, id FROM nucleo WHERE id = ".$mat['codNucleo']);
          				?>
          					<option value = "<?= $nucAtual['id'] ?>"><?= $nucAtual['nome'] ?></option>
          				<?php
          				$nuc = $db->select("SELECT nome, id FROM nucleo");
          				foreach ($nuc as $value) { ?>
            				<option value = "<?= $value['id'] ?>"><?= $value['nome'] ?></option>
          				<?php } ?>
        			</select>
	      		</td>
	      	</tr>
	        <tr>
	        	<td>Objetivo : </td>
	        	<td><textarea rows = "5" cols = "40" name = "objetivo"><?= $mat['objetivo'] ?></textarea></td>
	        </tr>
	        <tr>
	        	<td>Ementa : </td>
	        	<td><textarea rows = "5" cols = "40" name = "ementa"><?= $mat['ementa'] ?></textarea></td>
	        </tr>
	        <tr>
	        	<td>Optativa : </td>
	        	<?php
	        		if ($mat['optativa'] == 1){
	        	?>
	        	<td><input type = "checkbox" name = "opt" value = "1" checked></td>
	        	<?php
	        		}else{
	        	?>
	        	<td><input type = "checkbox" name = "opt" value = "1"></td>
	        	<?php } ?>
	        </tr>
	        <tr>
	        	<td></td>
	        	<td align = "right"><input type = "submit" value = "Editar"></td>
	        </tr>
        </table>
      </form> 
    </div>
  </div>
</body>
</html>