  <?php 
  require("../db.php");

  $db = new Db();


  $id = $_GET['id'];

  $result = $db->query("DELETE FROM noticia WHERE id = ".$id);

  if ($result == 1){
    header("Location: ../settings/noticiaConfig.php");
  }else{
     echo "<script>alert('erro sql')</script>";
  } 

?>
