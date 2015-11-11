  <?php 
  require("../db.php");

  $db = new Db();

  $id = $_GET['id'];

  $result = $db->query("DELETE FROM materia WHERE id = ".$id);

  if ($result == 1){
    header("Location: ../matConfig.php");
  }else{
     echo "<script>alert('erro sql')</script>";
  } 

?>
