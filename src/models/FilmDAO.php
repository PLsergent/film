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

    public function all() {
        require_once(PATH_ENTITIES.'film.php');
        $sql = 'SELECT id, titre, resume, nomFichier, genId FROM FILM';
        $res = $this->queryAll($sql);

        $films = array();
        if($res) {
            foreach($res as $f) {
                $films[] = new film($f['id'], $f['titre'], $f['resume'],
                                    $f['nomFichier'], $f['genId']);
            }
            return $films;
        }
        else return null;
    }
}
?>
