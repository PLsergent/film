<?php
require_once(PATH_MODELS.'DAO.php');

class filmDAO extends DAO {
    public function fromId($id) {
        require_once(PATH_ENTITIES.'film.php');
        $sql = 'SELECT id, titre, resume, nomFichier, genId FROM FILM WHERE id = ?';
        $res = $this->queryRow($sql, array($id));

        if($res) {
            return new film($res['id'], $res['titre'], $res['resume'],
                            $res['nomFichier'], $res['genId']);
        }
        else return null;
    }
}
?>
