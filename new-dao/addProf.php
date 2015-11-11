  <?php 
  session_start();

  session_start();
  require("../db.php");

  $db = new Db();

  $nome = $db->quote($_POST["nome"]);
  $usuario = $db->quote($_POST["user"]);
  $pagina = $db->quote($_POST["pagina"]);
  $area = $db->quote($_POST["area"]);
  $senha = $db->quote($_POST["senha"]);

  if ($_FILES['fileToUpload']['name'] != ""){
    include("../aux-files/upload.php");
    $foto = $db->quote($_FILES['fileToUpload']['name']);
  }else{
    $foto = $db->quote("padrao.PNG");
  }

  if (isset($_POST["adm"])){
    $adm = 1;
  }else{
    $adm = 0;
  }

  $resultUser = $db->query("INSERT INTO controle (usuario, senha, adm) VALUES (".$usuario.", ".$senha.", ".$adm.")");

  if ($resultUser == 1){
    $id = $db->selectOne("SELECT id FROM controle WHERE usuario = ".$usuario); 
    $result = $db->query("INSERT INTO professor (nome, foto, paginaPessoal, area, codUsuario) VALUES (".$nome.", ".$foto.", ".$pagina.", ".$area.", ".$id['id'].")");

    if ($result == 1){
      echo "<script>alert('professor criado com sucesso')</script>";
      header("Location: ../professores.php");
    }else{
      echo "<script>alert('erro sql')</script>";
    }

  }else{
    echo "<script>alert('erro sql')</script>";
  } 

?>
