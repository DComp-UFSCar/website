  <?php 
  session_start();

  require("../db.php");

  $db = new Db();

  $idMat = $_POST["mat"];
  $idProf = $_POST["prof"];
  $turma = $db->quote($_POST["turma"]);
  $ano = $db->quote($_POST["ano"]);
  $semestre = $_POST["sem"];

  $result = $db->query("INSERT INTO oferta (codProf, codMat, turma, ano, semestre) VALUES (".$idProf.", ".$idMat.", ".$turma.", ".$ano.", ".$semestre.")");

    if ($result == 1){
      header("Location: ../settings/ofertaConfig.php");
    }else{
      echo "<script>alert('erro sql')</script>";
    }

?>
