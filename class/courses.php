<?php
  require(dirname(__FILE__)."/../db.php");

  class Courses {

    public static function getCoursesByPerfil() {
      $db = new Db();
      $query = "SELECT cod, cod2, nome, codDisciplina, perfil, codNucleo FROM materia WHERE ativo = 1 and optativa = 0 ORDER BY perfil, nome";
      $arr = $db->select($query);
      
      $result = array();

      foreach ($arr as $data) {
        $perfil = $data['perfil'];
        if (!isset($result[$perfil])) {
          $result[$perfil] = array();
        }

        $result[$perfil][] = $data;
      }

      return $result;
    }

    public static function getOptinalCourses() {
      $db = new Db();
      $query = "SELECT cod, cod2, nome, codDisciplina, perfil, codNucleo FROM materia WHERE ativo = 1 and optativa = 1 ORDER BY nome";

      return $db->select($query);
    }

    public static function getAllCourses() {
      $db = new Db();
      $query = "SELECT cod, cod2, nome, codDisciplina, perfil, codNucleo FROM materia WHERE ativo = 1 ORDER BY perfil, nome";
      return $db->select($query);
    }

    public static function getAllPrerequisites() {
      $db = new Db();
      $query = "SELECT codMatPos as course, codMatPre as pre FROM prerequisito WHERE ativo = 1";
      return $db->select($query);
    }
  }
?>