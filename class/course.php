<?php
  require(dirname(__FILE__)."/../db.php");

  class Course {

    public $id = 0;
    public $codigo   = "";
    public $abrev    = "";
    public $nome     = "";
    public $ementa   = "";
    public $objetivo = "";
    public $credTeorico = "";
    public $credPratico = "";
    public $prerequisitos;
    public $ofertas;

    public function loadById($id) {
      $db = new Db();
      $id = $db->quote($id);
      $materia = $db->selectOne("SELECT * FROM materia WHERE id = ".$id);

      $this->id = $id;
      $this->codigo   = $materia["codigoEscolar"];
      $this->abrev    = $materia["abrev"];
      $this->nome     = $materia["nome"];
      $this->ementa   = $materia["ementa"];
      $this->objetivo = $materia["objetivo"];
      $this->credTeorico = $materia["nCreditosTeoricos"];
      $this->credPratico = $materia["nCreditosPraticos"];

      $this->loadPrerequisitos();
     // $this->loadOfertas();
    }

    public function loadPrerequisitos() {
      $db = new Db();
      $id = $this->id;
      $this->prerequisitos = $db->select("SELECT m.cod, m.nome FROM prerequisito p, materia m WHERE p.codMatPos = ".$id." AND m.cod = p.codMatPre");
    }

    public function loadOfertas() {
      $db = new Db();
      $id = $this->id;
      $this->ofertas = $db->select("SELECT * FROM ofertamateria WHERE ativo = 1 AND codMat = ".$id);

      for ($i = 0; $i < count($this->ofertas); $i++) {
        $codOferta = $this->ofertas[$i]["cod"];
        $this->ofertas[$i]['locais']    = $db->select("SELECT ofertahorario.codHorario, ofertahorario.codOferta, horario.dia, horario.inicio, horario.fim, horario.local FROM ofertahorario, horario WHERE ofertahorario.codOferta = '".$codOferta."' AND ofertahorario.codHorario = horario.cod");
        $this->ofertas[$i]['professor'] = $db->selectOne("SELECT id, nome, pagPessoal FROM professor WHERE id = ".$this->ofertas[$i]['codProf']);
      }
    }
  }
?>