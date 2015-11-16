  <?php 
  session_start();

  require("../db.php");

  $db = new Db();

  $nome = $db->quote($_POST["nome"]);
  $result = $db->query("INSERT INTO nucleo(nome) VALUES (".$nome.")");

    if ($result == 1){
      header("Location: ../settings/nucleoConfig.php");
    }else{
      echo "<script>alert('erro sql')</script>";
    }

?>
