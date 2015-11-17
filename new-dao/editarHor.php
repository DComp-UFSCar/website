  <?php
  session_start();
  require("../db.php");

  $db = new Db();
  
  $id = $_GET['id'];
  $dia = $db->quote($_POST["dia"]);
  $inicio = $db->quote($_POST["inicio"]);
  $fim = $db->quote($_POST["fim"]);
  $local = $db->quote($_POST["local"]);

  $result = $db->query("UPDATE horario set dia = ".$dia.", inicio = ".$inicio.", fim = ".$fim.", local = ".$local." WHERE id = " .$id);

  $oferta = $db->selectOne("SELECT codOferta FROM ofertaHorario WHERE codHorario = ".$id);
  $_SESSION['idOferta'] = $oferta['codOferta'];

  if ($result == 1){
      header("Location: ../horarios.php");
  }else{
      echo "<script>alert('erro sql')</script>";

  }
?>