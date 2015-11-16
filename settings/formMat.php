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
      <form action = "../new-dao/addMat.php" method = "POST" enctype="multipart/form-data">
        <br>
        <table style = "width: 60%">
	      	<tr>
	        	<td>Nome :</td> 
	        	<td><input type = "text" name = "nome"></td>
	        </tr>
	        <tr>
	        	<td>Codigo : </td>
	        	<td><input type = "text" name = "codigo"></td>
	        </tr>
	        <tr>
	        	<td>Abreviação : </td>
	        	<td><input type = "text" name = "abrev"></td>
	        </tr>
	        <tr>
	        	<td>Creditos Teoricos : </td>
	        	<td><input type = "number" name = "crT"></td>
	        </tr>
	        <tr>
	        	<td>Creditos Praticos : </td>
	        	<td><input type = "number" name = "crP"></td>
	        </tr>
	        <tr>
	        	<td>Perfil : </td>
	        	<td><input type = "number" name = "perfil" ></td>
	        </tr>
	        <tr>
	      		<td>Nucleo :</td> 
	      		<td>
					<select name = "nucleo">
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
	        	<td><textarea rows = "5" cols = "40" name = "objetivo"></textarea></td>
	        </tr>
	        <tr>
	        	<td>Ementa : </td>
	        	<td><textarea rows = "5" cols = "40" name = "ementa"></textarea></td>
	        </tr>
	        <tr>
	        	<td>Optativa : </td>
	        	<td><input type = "checkbox" name = "opt" value = "1"></td>
	        </tr>
	        <tr>
	        	<td></td>
	        	<td align = "right"><input type = "submit" value = "Adicionar"></td>
	        </tr>
        </table>
      </form> 
    </div>
  </div>
</body>
</html>