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
  $id = $_GET['id'];

  $menuSelected = 5; include "menu.php" ?>
  <div id="content">
    <header>Controle <?php include "login.php" ?> </header>
    <div id="main-content">
    <section>
        <header>Editar Oferta</header>
      <form action = "../new-dao/editarOferta.php?id=<?= $id ?>" method = "POST" enctype="multipart/form-data">
        <br>
        <table style = "width: 50%">
        	<tr>
	      		<td>Disciplina:</td> 
	      		<td>
					<select name = "mat">
          				<?php 
                  $oferta = $db->selectOne("SELECT * FROM oferta WHERE id = ".$id);
          				$matAtual = $db->selectOne("SELECT m.nome, m.id FROM materia as m, oferta as o where o.codMat = m.id and o.id = ".$id);
          				?>

          				<option value = "<?= $matAtual['id'] ?>"><?= $matAtual['nome'] ?></option>

          				<?php
          				$mats = $db->select("SELECT nome, id FROM materia where id != ".$matAtual['id']);
          				foreach ($mats as $value) { ?>
            				<option value = "<?= $value['id'] ?>"><?= $value['nome'] ?></option>
          				<?php } ?>
        			</select>
	      		</td>
	      	</tr>
	      	<tr>
	        	<td>Professor: </td> 
	        	<?php 
          				$profAtual = $db->selectOne("SELECT nome, idprofessor FROM professor, oferta WHERE oferta.codProf = professor.idprofessor AND oferta.id = ".$id);
          				?>
          				<td><select name = "prof">
          				<option value = "<?= $profAtual['idprofessor'] ?>"><?= $profAtual['nome'] ?></option>

          				<?php

	        			$profs = $db->select("SELECT nome, idprofessor FROM professor WHERE idprofessor != ".$profAtual['idprofessor']); ?>

          				<?php foreach ($profs as $value) { ?>
            				<option value = "<?= $value['idprofessor'] ?>"><?= $value['nome'] ?></option>
          				 <?php } ?>
        			</select>
	      		</td>
	        </tr>
	        <tr>
	        	<td>Turma :</td>
	        	<td><input type = "text" name = "turma" size = "24" value = "<?= $oferta['turma'] ?>"></td>
	        </tr>
	        <tr>
	        	<td>Ano : </td>
	        	<td><input type = "text" name = "ano" value = "2015" size = "24" value = "<?= $oferta['ano'] ?>"></td>
	        </tr>
	        <tr>
	        	<td>Semestre : </td>
            <?php
              if ($oferta['semestre'] == 1){
            ?>
	        	<td><input type = "radio" name = "sem" value = "1" checked>1º
	        		<input type = "radio" name = "sem" value = "2">2º</td>
            <?php 
              }else{
            ?> 
            <td><input type = "radio" name = "sem" value = "1">1º
              <input type = "radio" name = "sem" value = "2" checked>2º</td>
            <?php 
              }
            ?>
	        </tr>
	        	<td></td>
	        	<td align = "right"><input type = "submit" value = "Editar Oferta"></td>
	        </tr>
        </table>
      </form> 
  </section>
    </div>
  </div>
</body>
</html>