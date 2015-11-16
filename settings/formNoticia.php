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

  $menuSelected = 5; include "menu.php" ?>
  <div id="content">
    <header>Controle <?php include "login.php" ?> </header>
    <div id="main-content">
		<form action="../new-dao/addNot.php" method="post"><br>
			Titulo : <input type = "text" name = "titulo" size = "40"><br><br>
      		<textarea id="editor1" name="editor1">&lt;p&gt;Escreva sua noticia.&lt;/p&gt;</textarea><br>
      		<input type="submit" value="Adicionar Noticia" />
    	</form>  
    </div>
  </div>
   
  </body>
</html>