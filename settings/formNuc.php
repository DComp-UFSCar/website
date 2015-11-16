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
        <header>Cadastro de Nucleo</header>

      		<?php
	     		if (!isset($_GET['id'])){
	     	?>

      <form action = "../new-dao/addNucleo.php" method = "POST" enctype="multipart/form-data">
        <br>
	     <table style = "width: 45%">
	     	
	        <tr>
	        	<td>Nome : </td>
	        	<td><input type = "text" name = "nome" size = "54"></td>
	        </tr>
	        <tr>
	        	<td></td>
	        	<td align = "right"><input type = "submit" value = "Cadastrar Nucleo"></td>
	        </tr>
	        <?php
	        	}else{
	        	$id = $_GET['id'];
	        	$nome = $db->selectOne("SELECT nome FROM nucleo WHERE id = ".$id);	
	        ?>
	 <form action = "../new-dao/editarNuc.php?id=<?= $id ?>" method = "POST" enctype="multipart/form-data">
        <br>
	     <table style = "width: 45%">

	        <tr>
	        	<td>Nome : </td>
	        	<td><input type = "text" name = "nome" size = "54" value = "<?= $nome['nome'] ?>"></td>
	        </tr>
	        <tr>
	        	<td></td>
	        	<td align = "right"><input type = "submit" value = "Editar"></td>
	        </tr>
	        <?php
	        	}
	        ?>
	    </table>
      </form> 
  </section>
    </div>
  </div>
</body>
</html>