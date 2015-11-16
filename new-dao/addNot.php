  <?php 
  session_start();

  require("../db.php");

  $db = new Db();

  $texto = $db->quote($_POST["editor1"]);
  $titulo = $db->quote($_POST["titulo"]);
  $result = $db->query("INSERT INTO noticia(titulo, texto) VALUES (".$titulo.", ".$texto.")");

    if ($result == 1){
      header("Location: ../settings/noticiaConfig.php");
    }else{
      echo "<script>alert('erro sql')</script>";
    }

?>