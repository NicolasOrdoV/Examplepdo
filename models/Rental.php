<?php

/**
 * Modelo de Alquileres
 */
class Rental
{
	private $id;
	private $star_date;
	private $end_date;
	private $status_id;
	private $total;
	private $user_id;
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
			$strSql = "SELECT rs.*, u.name as user , s.status as status FROM rentals rs INNER JOIN users u
			INNER JOIN statuses s ON s.id = rs.status_id AND u.id = rs.user_id";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function newRental($data)
	{
		try {
			$data['status_id'] = 1;
			$this->pdo->insert('rentals', $data);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	
	public function editRental($data)
	{
		try {
			$strWhere = 'id=' . $data['id'];
			$this->pdo->update('rentals', $data, $strWhere);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	public function deleteRental($data)
	{
		try {
			$strWhere = 'id = ' . $data['id'];
			$this->pdo->delete('rentals', $strWhere);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	public function getById($id)
	{
		try {
			$strsql="SELECT * FROM rentals WHERE id= :id";
			$array =['id'=>$id];
			$query=$this->pdo->select($strsql,$array);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function editStatus($data)
    {
        try{
            $strWhere='id='.$data['id'];
            $this->pdo->update('rentals',$data,$strWhere);
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function getActiveStatus()
	{
		try {
			$strSql = "SELECT rs.*, u.name as user , s.status as status FROM rentals rs INNER JOIN users u
			INNER JOIN statuses s ON s.id = rs.status_id AND u.id = rs.user_id WHERE rs.status_id = 1 ORDER BY rs.id ASC";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
}
