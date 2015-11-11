<?php
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
  <?php session_start(); include "menu.php" ?>
  <div id="content">
    <header><?= $course->abrev ?><?php include "login.php" ?></header>
    <div id="main-content" class="course-content">
      <div class="course-info">
        <h1><?= $course->nome ?></h1>
      </div>
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
      <?php foreach ($course->ofertas as $oferta) { ?>
        <div class="oferta">
          <div class="oferta-title">Professor:</div>
          <div class="oferta-content">
            <a href="professor.php?id=<?= $oferta['professor']['idprofessor'] ?>">
              <?= $oferta['professor']['nome'] ?>
            </a>
          </div><br>
          <div class="oferta-title">Semestre:</div>
          <div class="oferta-content">2015 / <?= $oferta['semestre'] ?></div><br>

          <?php foreach ($oferta['locais'] as $local) { ?>
            <div class="oferta-local"><?= $local['local'] ?></div>
            <div class="oferta-horario"><?= $local['dia'] ?> - <?= $local['inicio'] ?> às <?= $local['fim'] ?></div>
          <?php } ?>
        </div>
      <?php } ?>
    </div>
  </div>
</body>
</html>