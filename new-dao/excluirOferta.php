  <?php 
  require("../db.php");

  $db = new Db();


  $id = $_GET['id'];
  $idHor = $db->select("SELECT codHorario FROM ofertaHorario WHERE codOferta = ".$id);

  foreach ($idHor as $value) {
    $resultHor = $db->query("DELETE FROM ofertaHorario WHERE codHorario = ".$value['codHorario']);
    $resultHor2 = $db->query("DELETE FROM horario WHERE id = ".$value['codHorario']);
  }

  $result = $db->query("DELETE FROM oferta WHERE id = ".$id);

  if ($result == 1){
    header("Location: ../settings/ofertaConfig.php");
  }else{
     echo "<script>alert('erro sql')</script>";
  } 

?>
