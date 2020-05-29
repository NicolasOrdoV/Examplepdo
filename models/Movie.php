<?php

/**
 * modelo de peliculas
 */
class Movie
{
    private $id;
    private $name;
    private $description;
    private $user_id;
    private $status_id;
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new Database;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function getAll()
    {
        try {
            $strSql = 'SELECT m.*, u.name as user, s.status as status FROM movies m INNER JOIN users u INNER JOIN statuses s ON s.id=m.status_id AND u.id=m.user_id';
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function newMovie($data)
    {
        try {
            $this->pdo->insert('movies', $data);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function editMovie($data)
    {
        try {
            $strWhere = 'id=' . $data['id'];
            $this->pdo->update('movies', $data, $strWhere);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function deleteMovie($data)
    {
        try {
            $strWhere = 'id=' . $data['id'];
            $this->pdo->delete('movies', $strWhere);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function getById($id)
    {
        try {
            $strSql = "SELECT * FROM movies WHERE id=:id";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function editStatus($data)
    {
        try{
            $strWhere='id='.$data['id'];
            $this->pdo->update('movies',$data,$strWhere);
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function getLastId()
    {
        try {
            $strSql = "SELECT MAX(id) as id FROM movies";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function saveCategoryMovie($arrayCategories, $movieId)
    {
        try {
            foreach ($arrayCategories as $category) {
                //Organizar datos para insertarlos en la tabla category_movie
                $data = [
                    'movie_id' => $movieId,
                    'category_id' => $category['id'],
                    'status_id' => 1
                ];
                //insertar los datos en la tabla
                $this->pdo->insert('category_movie', $data);
            }
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        } 
    }
}
