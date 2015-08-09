<?php
  require(dirname(__FILE__)."/../db.php");

  class Professor {

    public $id   = 0;
    public $nome = "";
    public $foto = "";
    public $area = "";
    public $site = "";
    public $courses;

    public function loadById($id) {
      $db = new Db();
      $id = $db->quote($id);
      $professor = $db->selectOne("SELECT * FROM professor WHERE idprofessor = ".$id);

      $this->id   = $id;
      $this->nome = $professor["nome"];
      $this->foto = $professor["foto"];
      $this->area = $professor["area"];
      $this->site = $professor["paginaPessoal"];

      $this->loadCourses();
    }

    public function loadCourses() {
      $db = new Db();
      $this->courses = $db->select("SELECT o.cod, o.codMat, m.nome, o.turma, o.ano, o.semestre FROM ofertamateria o, materia m WHERE o.codProf = ".$this->id." AND m.cod = o.codMat");

      for ($i = 0; $i < count($this->courses); $i++) {
        $this->courses[$i]['locais'] = $db->select("SELECT ofertahorario.codHorario, ofertahorario.codOferta, horario.dia, horario.inicio, horario.fim, horario.local FROM ofertahorario, horario WHERE ofertahorario.codOferta = '".$this->courses[$i]['cod']."' AND ofertahorario.codHorario = horario.cod");
      }
    }
  }
?>