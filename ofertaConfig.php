<!DOCTYPE html>
<html>
<head>
  <?php include "header.php"; ?>
  <link rel="stylesheet" type="text/css" href="css/tabela.css">
</head>

<body>
  <?php 
  session_start();
  require("db.php");

  $db = new Db();

  $ofertas = $db->select("SELECT * FROM oferta");

  $menuSelected = 5; include "menu.php" ?>
  <div id="content">
    <header>Controle <?php include "login.php" ?> </header>
    <div id="main-content">
      <section>
        <header>Ofertas</header>
        <table>
          <th>Professor</th>
          <th>Materia</th>
          <th>Turma</th>
          <th>Ano</th>
          <th>Semestre</th>
          <th>Horario</th>
          <?php foreach ($ofertas as $value) { ?>
          <tr>
            <?php
              $professor = $db->selectOne("SELECT nome FROM professor WHERE idprofessor = ".$value['codProf']);
              $materia = $db->selectOne("SELECT nome FROM materia WHERE id = ".$value['codMat']);
            ?>
            <td><?= $professor['nome'] ?></td>
            <td><?= $materia['nome'] ?></td>
            <td><?= $value['turma'] ?></td>
            <td><?= $value['ano'] ?></td>
            <td><?= $value['semestre'] ?></td>
            <td><a href="horarios.php?id=<?= $value['id'] ?>">Visualizar Horarios</a></td>
          </tr>
          <?php } ?>
        </table>
        <a href="formOferta.php">Adicionar Oferta</a>
      </section>
    </div>
  </div>
</body>
</html>