<!DOCTYPE html>
<html>
<head>
  <?php include "header.php"; ?>
</head>
<body>
  <?php
  session_start();
  require("db.php");

  $db = new Db();

  if (isset($_SESSION['idInicial'])){
    $_SESSION['id'] = $_SESSION['idInicial'];
  }

  $prof = $db->select("SELECT * FROM professor WHERE codUsuario = ".$_SESSION['id']);
  $user = $db->select("SELECT * FROM controle WHERE id = ".$_SESSION['id']);
  $profs = $db->select("SELECT nome FROM professor");


  $menuSelected = 5; include "menu.php" ?>
  <div id="content">
    <header>Configurações dos Professores <?php include "login.php" ?> </header>
    <div id="main-content">
    <?php if ($_SESSION["adm"] == 0){ 
            include("profEdit.php");
            if (isset($_SESSION['editado'])){
              echo "<script>alert('Professor editado com sucesso')</script>";
              unset($_SESSION['editado']);
            }
          }else if (isset($_POST['prof'])){ 
            $nome = $db->quote($_POST['prof']);
            $prof = $db->select("SELECT * FROM professor WHERE nome = ".$nome);
            $_SESSION['idInicial'] = $_SESSION['id'];
            $_SESSION['id'] = $prof[0]['codUsuario'];
            $user = $db->select("SELECT * FROM controle WHERE id = ".$_SESSION['id']);
            include("profEdit.php");
          }else{
      ?>
      <form action = "profConfig.php" method = "post">
        <br>
        Nome: <select name = "prof">
          <?php foreach ($profs as $value) { ?>
            <option value = "<?= $value['nome'] ?>"><?= $value['nome'] ?></option>
          <?php }
          if (isset($_SESSION['editado'])){
            echo "<script>alert('Professor editado com sucesso')</script>";
            unset($_SESSION['editado']);
          }
           ?>
        </select>  
        <input type = "submit" value = "selecionar">
      </form>
    <?php } ?>
    </div>
  </div>
</body>
</html>