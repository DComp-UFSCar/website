  <?php
  session_start();
  require("../db.php");

  $db = new Db();

  if (isset($_POST["nome"])){
  
  $id = $_GET['id'];
  $nome = $db->quote($_POST["nome"]);

  $result = $db->query("UPDATE nucleo set nome = ".$nome." WHERE id = " .$id);

  if ($result == 1){
      header("Location: ../nucleoConfig.php");
  }else{
      echo "<script>alert('erro sql')</script>";

  }
}
?>