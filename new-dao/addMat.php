  <?php 
  session_start();
  require("../db.php");

  $db = new Db();

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

  echo $nome;
  echo $objetivo;
  echo $ementa;
  echo $codigo;
  echo $crT;
  echo $crP;
  echo $abrev;
  echo $perfil;
  echo $codNucleo;


  $result = $db->query("INSERT INTO materia (nome, objetivo, ementa, nCreditosTeoricos, nCreditosPraticos, codigoEscolar, abrev, optativa, perfil, codNucleo) VALUES (".$nome.", ".$objetivo.", ".$ementa.", ".$crT.", ".$crP.", ".$codigo.", ".$abrev.", ".$opt.", ".$perfil.", ".$codNucleo.")");

  if ($result == 1){
    echo "<script>alert('materia criado com sucesso')</script>";
    header("Location: ../matConfig.php");
  }else{
    echo "<script>alert('erro sql')</script>";
  }

?>
