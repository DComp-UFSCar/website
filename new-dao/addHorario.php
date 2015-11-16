  <?php 
  session_start();

  require("../db.php");

  $db = new Db();

  $dia = $db->quote($_POST["dia"]);
  $inicio = $db->quote($_POST["inicio"]);
  $fim = $db->quote($_POST["fim"]);
  $local = $db->quote($_POST["local"]);

  //echo $dia;
  //echo $inicio;
  //echo $fim;
  //echo $local;

  $result = $db->query("INSERT INTO horario (dia, inicio, fim, local) VALUES (".$dia.", ".$inicio.", ".$fim.", ".$local.")");
  $idHorario = $db->selectOne("SELECT id FROM horario WHERE dia = ".$dia." and inicio = ".$inicio." and fim = ".$fim." and local = ".$local);

  $resultOfertaHorario = $db->query("INSERT INTO ofertaHorario VALUES (".$idHorario['id'].", ".$_SESSION['idOferta'].")");

    if ($result == 1 && $resultOfertaHorario == 1){
      header("Location: ../settings/horarios.php");
    }else{
      echo "<script>alert('erro sql')</script>";
    }

?>
