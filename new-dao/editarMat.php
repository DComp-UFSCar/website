  <?php
  session_start();
  require("../db.php");

  $db = new Db();
  $id = $_GET['id'];

  $nome = $db->quote($_POST["nome"]);
  $objetivo = $db->quote($_POST["objetivo"]);
  $ementa = $db->quote($_POST["ementa"]);
  $codigo = $db->quote($_POST["codigo"]);
  $crT = $_POST["crT"];
  $crP = $_POST["crP"];
  $abrev = $db->quote($_POST["abrev"]);
  $perfil = $_POST["perfil"];
  $codNucleo = $_POST["nucleo"];

  if (isset($_POST["opt"])){
    $opt = 1;
  }else{
    $opt = 0;
  }

  $result = $db->query("UPDATE materia set nome = ".$nome.", objetivo = ".$objetivo.", ementa = ".$ementa.", codigoEscolar = ".$codigo.", nCreditosTeoricos = ".$crT.", nCreditosPraticos = ".$crP.", abrev = ".$abrev.", perfil = ".$perfil.", codNucleo = ".$codNucleo.", optativa = ".$opt." WHERE id = ".$id);


  if ($result == 1){
      $_SESSION['editado'] = 1;
      header("Location: ../matConfig.php");
  }else{
      echo "<script>alert('erro sql')</script>";

  }
?>