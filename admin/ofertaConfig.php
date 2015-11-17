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
  
  if ($_SESSION['adm'] == 1){
    $ofertas = $db->select("SELECT * FROM oferta");
  }else{
    $profAtual = $db->selectOne("SELECT idprofessor FROM professor where codUsuario = ".$_SESSION['id']);
    $ofertas = $db->select("SELECT * FROM oferta where codProf = ".$profAtual['idprofessor']);
  }

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
          <?php
            if ($_SESSION['adm'] == 1){
          ?>
            <th>Ação</th>
          <?php
            }
          ?>
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
            <?php 
              if ($_SESSION['adm'] == 1){
            ?>
            <td><a href="editOfertaForm.php?id=<?= $value['id'] ?>">Editar</a> <a href="../new-dao/excluirOferta.php?id=<?= $value['id'] ?>">Excluir</a></td>
            <?php
              }
            ?>
          </tr>
          <?php } ?>
        </table>
        <?php 
          if ($_SESSION['adm'] == 1){
        ?>
          <a href="formOferta.php">Adicionar Oferta</a>
        <?php
          }
        ?>
      </section>
    </div>
  </div>
</body>
</html>