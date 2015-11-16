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
  
  $materias = $db->select("SELECT * FROM materia");

  $menuSelected = 5; include "menu.php" ?>
  <div id="content">
    <header>Controle <?php include "login.php" ?> </header>
    <div id="main-content">
      <section>
        <header>Materias</header>
        <table>
          <th>Nome</th>
          <th>Codigo</th>
          <th>Ação</th>
          <?php foreach ($materias as $value) { ?>
          <tr>
            <td><?= $value['nome'] ?></td>
            <td><?= $value['codigoEscolar'] ?></td>
            <td><a href="editMatForm.php?id=<?= $value['id'] ?>">Editar</a> <a href="../new-dao/excluirMat.php?id=<?= $value['id'] ?>">Excluir</a></td>
          </tr>
          <?php } ?>
        </table>
        <a href="formMat.php">Adicionar Materia</a>
      </section>
    </div>
  </div>
</body>
</html>