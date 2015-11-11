<?php
  require(dirname(__FILE__)."/../db.php");

  class Professors {

    public static function getAll() {
      $db = new Db();
      $query = "SELECT * FROM professor ORDER BY nome";
      return $db->select($query);
    }
  }
?>