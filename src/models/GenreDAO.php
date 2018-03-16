<?php
require_once (PATH_MODELS . 'DAO.php');
require_once (PATH_ENTITIES . 'Genre.php');

class GenreDAO extends DAO
{

    public function getAll()
    {
        $res = $this->queryAll('SELECT * FROM GENRE');
        if ($res == false)
            $genres = array();
        else {
            foreach ($res as $p) {
                $genres[] = new Genre($p['id'], $p['libelle']);
            }
        }
        return $genres;
    }

    public function getAllUsed()
    {
        $res = $this->queryAll('SELECT DISTINCT GENRE.* FROM GENRE JOIN FILM ON GENRE.ID = FILM.GENID');
        if ($res == false)
            $genres = array();
        else {
            foreach ($res as $p) {
                $genres[] = new Genre($p['id'], $p['libelle']);
            }
        }
        return $genres;
    }

    public function getById($id)
    {
        $res = $this->queryRow('SELECT * FROM GENRE WHERE id=?', array(
            $id
        ));
        if ($res == false)
            $genre = null;
        else
            $genre = new Genre($res['id'], $res['libelle']);
        return $genre;
    }
}
