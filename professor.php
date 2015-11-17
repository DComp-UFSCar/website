<?php
  include "class/professor.php";

  $id = $_GET['id'];
  $professor = new Professor();
  $professor->loadById($id);
?>
<!DOCTYPE html>
<html>
<head>
  <?php include "header.php"; ?>
</head>
<body>
  <?php $menuSelected = 3; include "menu.php" ?>
  <div id="content">
    <header class="huge-header">
      <div class="professor-img" style="background-image: url(fotos-professores/<?= $professor->foto ?>);"></div>
      <h1 class="professor-name"><?= $professor->nome ?></h1>
    </header>
    <div id="main-content" class="professor-main">
      <section>
        <header>Sobre</header>
        <div class="professor-info">
          <div class="professor-info-title">Página Pessoal</div>
          <div class="professor-info-content">
            <a href="http://<?= $professor->site ?>">
              <?= $professor->site ?>
            </a>
          </div>
        </div>
        <div class="professor-info">
          <div class="professor-info-title">Área de Atuação</div>
          <div class="professor-info-content"><?= $professor->area ?></div>
        </div>
      </section>
      <?php foreach ($professor->courses as $course) { ?>
        <section class="oferta">
          <header>
            <a href="disciplina.php?id=<?= $course['codMat'] ?>">
              <?= $course['nome'] ?>
            </a>
          </header>
          <div class="oferta-title">Semestre:</div>
          <div class="oferta-content">2015 / <?= $course['semestre'] ?></div><br>

          <?php foreach ($course['locais'] as $local) { ?>
            <div class="oferta-local"><?= $local['local'] ?></div>
            <div class="oferta-horario"><?= $local['dia'] ?> - <?= $local['inicio'] ?> às <?= $local['fim'] ?></div>
          <?php } ?>
        </section>
      <?php } ?>
    </div>
  </div>
</body>
</html>
