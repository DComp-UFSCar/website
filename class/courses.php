<?php
  require(dirname(__FILE__)."/../db.php");

  class Courses {

    public static function getCoursesByPerfil() {
      $db = new Db();
      $query = "SELECT id, nome, codigoEscolar, abrev, perfil, codNucleo FROM materia WHERE optativa = 0 ORDER BY perfil, nome";
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
      $query = "SELECT id, nome, codigoEscolar, abrev, perfil, codNucleo FROM materia WHERE optativa = 1 ORDER BY nome";

      return $db->select($query);
    }

    public static function getAllCourses() {
      $db = new Db();
      $query = "SELECT id, nome, codigoEscolar, abrev, perfil, codNucleo FROM materia ORDER BY perfil, nome";
      return $db->select($query);
    }

    public static function getAllPrerequisites() {
      $db = new Db();
      $query = "SELECT codMat as course, codMatPre as pre FROM prerequisito";
      return $db->select($query);
    }
  }
?>