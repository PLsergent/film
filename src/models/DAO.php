<?php
require_once(PATH_MODELS . 'Connexion.php');

abstract class DAO {
    private $_erreur;

    public function getErreur() {
        return $this->_erreur;
    }

    private function _requete($sql, $args = null) {
        if ($args == null) {
            $pdos = Connexion::getInstance()->getBdd()->query($sql);
        } else {
            $pdos = Connexion::getInstance()->getBdd()->prepare($sql);
            $pdos->execute($args);
        }
        return $pdos;
    }

    public function queryRow($sql, $args = null) {
        try {
            $pdos = $this->_requete($sql, $args);
            $res = $pdos->fetch();
            $pdos->closeCursor();
        }
        catch (PDOException $e) {
            $this->_erreur = $e->getMessage();
            $res = false;
        }
        return $res;
    }

    public function queryAll($sql, $args = null) {
        try {
            $pdos = $this->_requete($sql, $args);
            $res = $pdos->fetchAll();
            $pdos->closeCursor();
        }
        catch (PDOException $e) {
            $this->_erreur = $e->getMessage();
            $res = false;
        }
        return $res;
    }
}
