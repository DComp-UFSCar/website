<?php
  session_start();
  include "class/course.php";

  $id = $_GET["id"];
  $course = new Course();
  $course->loadByID($id);
?>
<!DOCTYPE html>
<html>
<head>
  <?php include "header.php"; ?>
</head>
<body>
  <?php $menuSelected = 1; include "menu.php" ?>
  <div id="content">
    <header><?= $course->abrev ?></header>
    <div id="main-content">
      <section>
        <header><?= $course->nome ?></header>
        <div class="course-info">
          <div class="course-info-title">Código da Disciplina</div>
          <div class="course-info-content"><?= $course->codigo ?></div>
        </div>
        <div class="course-info">
          <div class="course-info-title">Ementa</div>
          <div class="course-info-content"><?= $course->ementa ?></div>
        </div>
        <div class="course-info">
          <div class="course-info-title">Objectivo</div>
          <div class="course-info-content"><?= $course->objetivo ?></div>
        </div>
        <div class="course-info">
          <div class="course-info-title">Créditos Teóricos</div>
          <div class="course-info-content"><?= $course->credTeorico ?></div>
        </div>
        <div class="course-info">
          <div class="course-info-title">Créditos Práticos</div>
          <div class="course-info-content"><?= $course->credPratico ?></div>
        </div>
        <div class="course-info">
          <div class="course-info-title">Pré-requisitos</div>
          <div class="course-info-content">
            <?php if (count($course->prerequisitos) > 0) { ?>
              <ul class="lista-prerequisitos">
                <?php foreach ($course->prerequisitos as $requisito) { ?>
                  <a href="disciplina.php?id=<?= $requisito['cod'] ?>">
                    <li><?= $requisito['nome'] ?></li>
                  </a>
                <?php } ?>
              </ul>
            <?php } else { ?>
              Nenhum
            <?php } ?>
          </div>
        </div>
      </section>
      <?php foreach ($course->ofertas as $oferta) { ?>
        <section class="oferta">
          <header>2015 / <?= $oferta['semestre'] ?></header>
          <div class="oferta-title">Professor:</div>
          <div class="oferta-content">
            <a href="professor.php?id=<?= $oferta['professor']['idprofessor'] ?>">
              <?= $oferta['professor']['nome'] ?>
            </a>
          </div><br>

          <?php foreach ($oferta['locais'] as $local) { ?>
            <div class="oferta-local"><?= $local['local'] ?></div>
            <div class="oferta-horario"><?= $local['dia'] ?> - <?= $local['inicio'] ?> às <?= $local['fim'] ?></div>
          <?php } ?>
        </section>
      <?php } ?>
    </div>
  </div>
</body>
</html>
