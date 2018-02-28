<?php
require_once(PATH_MODELS.'DAO.php');

class filmDAO extends DAO {
    public function fromId($id) {
        require_once(PATH_ENTITIES.'film.php');
        $res = $this->queryRow('SELECT * FROM FILM WHERE id = ?', array($id));

        if($res) {
            return new film($res['id'], $res['titre'], $res['resume'],
                            $res['nomFichier'],$res['genId']);
        }
        else return null;
    }
}

