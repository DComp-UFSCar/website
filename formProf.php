<!DOCTYPE html>
<html>
<head>
  <?php include "header.php"; ?>
</head>
<body>
  <?php 
  session_start();

  $menuSelected = 5; include "menu.php" ?>
  <div id="content">
    <header>Controle <?php include "login.php" ?> </header>
    <div id="main-content">
      <form action = "new-dao/addProf.php" method = "POST" enctype="multipart/form-data">
        <br>
        <table>
        	<tr>
	      		<td>Foto:</td> 
	      		<td><img src="fotos-professores/padrao.PNG" heigth = "90" width = "70">
	      			<input type ="file" name = "fileToUpload" id = "fileToUpload">
	      		</td>
	      	</tr>
	      	<tr>
	        	<td>Nome:</td> 
	        	<td><input type = "text" name = "nome"></td>
	        </tr>
	        <tr>
	        	<td>Nome do Usuario :</td>
	        	<td><input type = "text" name = "user"></td>
	        </tr>
	        <tr>
	        	<td>Pagina Pessoal : </td>
	        	<td><input type = "text" name = "pagina" size = "35"></td>
	        </tr>
	        <tr>
	        	<td>Area de Atuação : </td>
	        	<td><input type = "text" name = "area" size ="60"></td>
	        </tr>
	        <tr>
	        	<td>Senha : </td>
	        	<td><input type = "text" name = "senha"></td>
	        </tr>
	        <tr>
	        	<td>Administrador : </td>
	        	<td><input type = "checkbox" name = "adm" value = "1"></td>
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