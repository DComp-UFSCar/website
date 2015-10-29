  <?php
  session_start();
  require("../db.php");

  $db = new Db();

  $idOferta = $_GET['id'];  
  $idMat = $_POST["mat"];
  $idProf = $_POST["prof"];
  $turma = $db->quote($_POST["turma"]);
  $ano = $db->quote($_POST["ano"]);
  $sem = $_POST["sem"];

  echo "entrou";


  $result = $db->query("UPDATE oferta set codMat = ".$idMat.", codProf = ".$idProf.", turma = ".$turma.", ano = ".$ano.", semestre = ".$sem." WHERE id = ".$idOferta);

  if ($result == 1){
      header("Location: ../ofertaConfig.php");
  }else{
      echo "<script>alert('erro sql')</script>";

  }
?>