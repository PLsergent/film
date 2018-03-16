<?php
require_once(PATH_MODELS.'DAO.php');
require_once(PATH_ENTITIES.'film.php');

class filmDAO extends DAO {

    public function all() {
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

    public function fromId($id) {
        $sql = 'SELECT id, titre, resume, nomFichier, genId FROM FILM WHERE id = ?';
        $res = $this->queryRow($sql, array($id));

        if($res) {
            return new film($res['id'], $res['titre'], $res['resume'],
                            $res['nomFichier'], $res['genId']);
        }
        else return null;
    }

    public function fromGenre($genre_id) {
        $sql = 'SELECT id, titre, resume, nomFichier, genId FROM FILM, GENRE WHERE FILM.Genid=GENRE.ID AND GENRE.ID = ?';
        $res = $this->queryAll($sql, array($genre_id));

        if($res) {
            return new film($res['id'], $res['titre'], $res['resume'],
                            $res['nomFichier'], $res['genId']);
        }
        else return null;
    }

    public function insert($film) {
        $sql = 'INSERT INTO FILM ?';
        $this->queryBdd($sql, array($film->getId(), $film->getTitre(),
                                    $film->getResume(), $film->getNomFichier(),
                                    $film->getGenId()));
    }

    public function update($film) {
        $sql = 'UPDATE INTO FILM ?';
        $this->queryBdd($sql, array($film->getId(), $film->getTitre(),
                                    $film->getResume(), $film->getNomFichier(),
                                    $film->getGenId()));
    }

    public function delete($film) {
        $sql = 'DROP FILM ?';
        $this->queryBdd($sql, array($film->getId(), $film->getTitre(),
                                    $film->getResume(), $film->getNomFichier(),
                                    $film->getGenId()));
    }
}
?>
