<?php
require_once(PATH_MODELS . 'DAO.php');

class genreDAO extends DAO {
    public function fromId($id) {
        require_once(PATH_ENTITIES . 'genre.php');
        $res = $this->queryRow('SELECT * FROM GENRE WHERE id = ?', array($id));
        if ($res) {
            return new genre($res['id'], $res['libelle']);
        }
        else return null;
    }
}
?>
