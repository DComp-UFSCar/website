  <?php
  session_start();
  require("../db.php");

  $db = new Db();

  if (isset($_POST["nome"])){

  $nome = $db->quote($_POST["nome"]);
  $usuario = $db->quote($_POST["user"]);
  $pagina = $db->quote($_POST["pagina"]);
  $area = $db->quote($_POST["area"]);
  $senha = $db->quote($_POST["senha"]);

  if ($_FILES['fileToUpload']['name'] != ""){
    include("upload.php");
    $foto = $db->quote($_FILES['fileToUpload']['name']);
  }else{
    $photo = $db->selectOne("SELECT foto FROM professor WHERE codUsuario = ".$_SESSION["id"]);
    $foto = $db->quote($photo["foto"]);
  }

  if (isset($_POST["adm"])){
    $adm = 1;
  }else{
    $adm = 0;
  }

  $result = $db->query("UPDATE professor set nome = ".$nome.", paginaPessoal = ".$pagina.", area = ".$area.", foto = ".$foto." WHERE codUsuario = ".$_SESSION['id']);
  $resultUser = $db->query("UPDATE controle set usuario = ".$usuario.", senha = ".$senha.", adm = ".$adm." WHERE id = ".$_SESSION['id']);
}
  $prof = $db->select("SELECT * FROM professor WHERE codUsuario = ".$_SESSION['id']);

  $user = $db->select("SELECT * FROM controle WHERE id = ".$_SESSION['id']);

  if ($result == 1 && $resultUser == 1){
      $_SESSION['editado'] = 1;
      header("Location: ../profConfig.php");
  }else{
      echo "<script>alert('erro sql')</script>";

  }
?>
