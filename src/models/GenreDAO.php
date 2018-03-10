<?php
require_once(PATH_MODELS . 'DAO.php');

class genreDAO extends DAO {
    public function fromId($id) {
        require_once(PATH_ENTITIES.'genre.php');
        $res = $this->queryRow('SELECT * FROM GENRE WHERE id = ?', array($id));
        if ($res) {
            return new genre($res['id'], $res['libelle']);
        }
        else return null;
    }

    public function all() {
        require_once(PATH_ENTITIES.'genre.php');
        $sql = 'SELECT * FROM GENRE';
        $res = $this->queryAll($sql);

        $genres = array();
        if($res) {
            $i = 1;
            foreach($res as $g) {
                $genres[] = new genre($i, $g['libelle']);
                $i = $i + 1;
            }
            return $genres;
        }
        else return null;
    }
}
?>
