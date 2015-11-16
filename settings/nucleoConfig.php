<!DOCTYPE html>
<html>
<head>
  <?php include "header.php"; ?>
  <link rel="stylesheet" type="text/css" href="../css/tabela.css">
</head>

<body>
  <?php 
  session_start();
  require("../db.php");

  $db = new Db();
  
  $nucleos = $db->select("SELECT * FROM nucleo");

  $menuSelected = 5; include "menu.php" ?>
  <div id="content">
    <header>Controle <?php include "login.php" ?> </header>
    <div id="main-content">
      <section>
        <header>Nucleos</header>
        <table>
          <th>Nome</th>
          <th>Ação</th>
          <?php foreach ($nucleos as $value) { ?>
          <tr>
            <td><?= $value['nome'] ?></td>
            <td><a href="formNuc.php?id=<?= $value['id'] ?>">Editar</a> <a href="../new-dao/excluirNuc.php?id=<?= $value['id'] ?>">Excluir</a></td>
          </tr>
          <?php } ?>
        </table>
        <a href="formNuc.php">Adicionar Nucleo</a>
      </section>
    </div>
  </div>
</body>
</html>