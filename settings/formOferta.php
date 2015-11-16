<!DOCTYPE html>
<html>
<head>
  <?php include "header.php"; ?>
</head>
<body>
  <?php 
  session_start();
  require("../db.php");

  $db = new Db();

  $menuSelected = 5; include "menu.php" ?>
  <div id="content">
    <header>Controle <?php include "login.php" ?> </header>
    <div id="main-content">
    <section>
        <header>Cadastro de Oferta</header>
      <form action = "../new-dao/addOferta.php" method = "POST" enctype="multipart/form-data">
        <br>
        <table style = "width: 50%">
        	<tr>
	      		<td>Disciplina:</td> 
	      		<td>
					<select name = "mat">
          				<?php 
          				$mats = $db->select("SELECT nome, id FROM materia");
          				foreach ($mats as $value) { ?>
            				<option value = "<?= $value['id'] ?>"><?= $value['nome'] ?></option>
          				<?php } ?>
        			</select>
	      		</td>
	      	</tr>
	      	<tr>
	        	<td>Professor: </td> 
	        	<?php 
	        		if ($_SESSION['adm'] == 1){
	        			$profs = $db->select("SELECT nome, idprofessor FROM professor"); ?>

          				<td><select name = "prof">

          				<?php foreach ($profs as $value) { ?>
            				<option value = "<?= $value['idprofessor'] ?>"><?= $value['nome'] ?></option>
          				 <?php } ?>
        			</select>
	      		</td>
	      		<?php }else{ 
	      				$profAtual = $db->selectOne("SELECT nome FROM professor WHERE codUsuario = ".$_SESSION['id']);
	      		?>
	      			<td><input type = "text" name = "prof" value = "<?= $profAtual['nome'] ?>" size = "24" readonly></td>
	      		<?php } ?>
	        </tr>
	        <tr>
	        	<td>Turma :</td>
	        	<td><input type = "text" name = "turma" size = "24"></td>
	        </tr>
	        <tr>
	        	<td>Ano : </td>
	        	<td><input type = "text" name = "ano" value = "2015" size = "24"></td>
	        </tr>
	        <tr>
	        	<td>Semestre : </td>
	        	<td><input type = "radio" name = "sem" value = "1">1º
	        		<input type = "radio" name = "sem" value = "2">2º</td>
	        </tr>
	        	<td></td>
	        	<td align = "right"><input type = "submit" value = "Adicionar Oferta"></td>
	        </tr>
        </table>
      </form> 
  </section>
    </div>
  </div>
</body>
</html>