<?php
class film {
  private $_id;
  private $_titre;
  private $_resume;
  private $_nomFichier;
  private $_genId;

  public function __construct($id, $titre, $resume, $nomFichier, $genId) {
    $this->_id = $id;
    $this->_titre = $titre;
    $this->_resume = $resume;
    $this->_nomFichier=$nomFichier;
    $this->_genId=$genId;
  }

  public function getId() {
    return $this->_id;
  }

  public function getTitre() {
    return $this->_titre;
  }


  public function getResume() {
    return $this->_resume;
  }

  public function getNomFichier() {
    return $this->_nomFichier;
  }

  public function getGenId() {
    return $this->_genId;
  }

  public function setMot($mot) {
    $this->_mot = $mot;
  }

  public function getNbRepet() {
    return $this->_nbRepet;
  }
}
