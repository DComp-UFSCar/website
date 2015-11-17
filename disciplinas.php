<?php include "class/courses.php" ?>
<!DOCTYPE html>
<html>
<head>
  <?php include "header.php"; ?>
</head>
<body>
  <?php $menuSelected = 1; include "menu.php" ?>
  <div id="content">
    <header>Disciplinas</header>
    <div id="main-content">
      <?php foreach (Courses::getCoursesByPerfil() as $perfil=>$perfilData) { ?>
        <section>
          <header>Perfil <?= $perfil ?></header>
          <ul class="course-list">
            <?php foreach ($perfilData as $course) { ?>
              <a href="disciplina.php?id=<?= $course['id'] ?>">
                <li>
                  <?= $course['nome'] ?>
                  <?php if ($course['optativa'] == 1) { ?>
                    - <strong>OPTATIVA</strong>
                  <?php } ?>
                </li>
              </a>
            <?php } ?>
          </ul>
        </section>
      <?php } ?>
    </div>
  </div>
</body>
</html>
