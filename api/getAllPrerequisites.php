<?php
  include "../class/courses.php";
  $courses = Courses::getAllPrerequisites();

  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($courses);
?>