  <?php 
  require("../db.php");

  $db = new Db();


  $id = $_GET['id'];

  $result = $db->query("DELETE FROM nucleo WHERE id = ".$id);

  if ($result == 1){
    header("Location: ../nucleoConfig.php");
  }else{
     echo "<script>alert('erro sql')</script>";
  } 

?>