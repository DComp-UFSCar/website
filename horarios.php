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

  if (isset($_GET['id'])){
    $_SESSION['idOferta'] = $_GET['id'];
  }

  $ofertaAtual = $db->select("SELECT * FROM oferta WHERE id = ".$_SESSION['idOferta']);
  $materiaAtual = $db->select("SELECT nome FROM materia WHERE id = ".$ofertaAtual[0]['codMat']);
  $horarios = $db->select("SELECT * FROM horario as h, ofertaHorario as oh WHERE h.id = oh.codHorario and codOferta = ".$ofertaAtual[0]['id']);

  $menuSelected = 5; include "menu.php" ?>
  <div id="content">
    <header>Controle <?php include "login.php" ?> </header>
    <div id="main-content">
      <section>
        <header>Horarios de <?= $materiaAtual[0]['nome'] ?></header>
        <?php if (isset($horarios[0]['dia'])){ ?>
        <table>
          <th>Dia</th>
          <th>Inicio</th>
          <th>Fim</th>
          <th>Local</th>
          <?php foreach ($horarios as $value) { ?>
          <tr>
            <td><?= $value['dia'] ?></td>
            <td><?= $value['inicio'] ?></td>
            <td><?= $value['fim'] ?></td>
            <td><?= $value['local'] ?></td>
          </tr>
          <?php } ?>
        </table>
        <?php }else{ 
                echo "Nenhum horario cadastrado";
        }
        if ($_SESSION['adm'] == 1){
        ?>
        <a href="formHorarios.php">+ Horarios</a>
        <?php
        }
        ?>
      </section>
    </div>
  </div>
</body>
</html>