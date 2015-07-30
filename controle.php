<!DOCTYPE html>
<html>
<head>
  <?php include "header.php"; ?>
</head>
<body>
  <?php 
  session_start();
  require(dirname(__FILE__)."/db.php");

  if (!isset($_SESSION['ativo'])){
    $db = new Db();
    $usuario = $db->quote($_POST["user"]);
    $senha = $db->selectOne("SELECT * FROM controle WHERE usuario = ".$usuario);

    if ($_POST["pass"] == $senha["senha"]){
      $_SESSION['ativo'] = 1;
      $_SESSION['user'] = $_POST["user"];
    }
  }

  $menuSelected = 5; include "menu.php" ?>
  <div id="content">
    <header>Controle <?php include "login.php" ?> </header>
    <div id="main-content">
      Bem Vindo
      <?php
        echo $_SESSION["user"];
      ?>
    </div>
  </div>
</body>
</html>