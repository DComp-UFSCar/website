  <?php
  session_start();
  require("../db.php");

  $db = new Db();

  if (isset($_POST["titulo"])){
  
  $id = $_GET['id'];
  $titulo = $db->quote($_POST["titulo"]);
  $texto = $db->quote($_POST["editor1"]);

  $result = $db->query("UPDATE noticia set texto = ".$texto.", titulo = ".$titulo." WHERE id = " .$id);

  if ($result == 1){
      header("Location: ../settings/noticiaConfig.php");
  }else{
      echo "<script>alert('erro sql')</script>";

  }
}
?>