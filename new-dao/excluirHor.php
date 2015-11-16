  <?php 
  require("../db.php");

  $db = new Db();


  $id = $_GET['id'];

  $result = $db->query("DELETE FROM ofertaHorario WHERE codHorario = ".$id);
  $result2 = $db->query("DELETE FROM horario WHERE id = ".$id);

  $oferta = $db->selectOne("SELECT codOferta FROM ofertaHorario WHERE codHorario = ".$id);
  $_SESSION['idOferta'] = $oferta['codOferta'];

  if ($result == 1 && $result2 == 1){
    header("Location: ../settings/horarios.php");
  }else{
     echo "<script>alert('erro sql')</script>";
  } 

?>
