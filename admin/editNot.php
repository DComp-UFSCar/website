<!DOCTYPE html>
<html>
<head>
  <?php include "header.php"; ?>
  <meta content="text/html; charset=utf-8" http-equiv="content-type" />
  <script type="text/javascript" src="../js/ckeditor/ckeditor.js"></script>
  <script type="text/javascript">
  	window.onload = function()  {
        CKEDITOR.replace( 'editor1' );
     };
   </script>
</head>
<body>
  <?php 
  session_start();
  require("../db.php");

  $db = new Db();
  $idNoticia = $_GET['id'];

  $noticia = $db->selectOne("SELECT * FROM noticia WHERE id = ".$idNoticia);

  $menuSelected = 5; include "menu.php" ?>
  <div id="content">
    <header>Controle <?php include "login.php" ?> </header>
    <div id="main-content">
    	<section>
        <header>Editar Noticia</header>
      		<form action = "../new-dao/editarNot.php?id=<?= $idNoticia ?>" method = "POST" enctype="multipart/form-data">
      			Titulo : <input type = "text" name = "titulo" size = "40" value = "<?= $noticia['titulo'] ?>"><br><br>
      			<textarea id="editor1" name="editor1" >&lt;p&gt;<?= $noticia['texto'] ?>&lt;/p&gt;</textarea><br>
      			<input type="submit" value="Editar Noticia" />
      		</form> 
  		</section>
    </div>
  </div>
</body>
</html>