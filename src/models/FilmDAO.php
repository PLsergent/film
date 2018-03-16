<?php
require_once (PATH_MODELS . 'DAO.php');
require_once (PATH_ENTITIES . 'Film.php');

class FilmDAO extends DAO
{

    public function getAll($genId = 0)
    {
        if ($genId == 0)
            $res = $this->queryAll('SELECT * FROM FILM');
        else
            $res = $this->queryAll('SELECT * FROM FILM WHERE genId=?', array(
                $genId
            ));
        if ($res == false)
            $films = array();
        else {
            foreach ($res as $p) {
                $films[] = new Film($p['id'], $p['titre'], $p['resume'], $p['genId'] , $p['nomFichier'] );
            }
        }
        return $films;
    }

    public function getById($id)
    {
        $res = $this->queryRow('SELECT * FROM FILM WHERE id=?', array(
            $id
        ));
        if ($res === false)
            $film = null;
        else
            $film = new Film($res['id'], $res['titre'], $res['resume'], $res['genId'] , $res['nomFichier']);
        return $film;
    }

    public function insert($titre, $resume, $genId, $nomFichier)
    {
       $this->queryBdd('INSERT INTO FILM (titre, resume, genId, nomFichier) VALUE (?, ?, ?, ?)',
                       array($titre, $resume, $genId, $nomFichier));
    }

    public function update($column, $value)
    {
        $this->queryBdd("UPDATE FILM SET ?='?'", array($column, $value));
    }

    public function delete($id)
    {
        $this->queryBdd("DELETE FROM FILM WHERE id=?", array($id));
    }
}
