<?php

/**
 * Modelo de Usuario
 */
class User
{
	private $id;
	private $name;
	private $email;
	private $password;
	private $status_id;
	private $role_id;
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
			$strSql = "SELECT u.*, s.status as status,r.name as role FROM users u INNER JOIN  statuses s ON s.id=u.status_id INNER JOIN roles r ON r.id = u.rol_id ORDER BY u.id ASC";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function newUser($data)
	{
		try {
			$data['status_id'] = 1;
			$this->pdo->insert('users', $data);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	
	public function editUser($data)
	{
		try {
			$strWhere = 'id=' . $data['id'];
			$this->pdo->update('users', $data, $strWhere);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	public function deleteUser($data)
	{
		try {
			$strWhere = 'id = ' . $data['id'];
			$this->pdo->delete('users', $strWhere);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	public function getById($id)
	{
		try {
			$strsql="SELECT * FROM users WHERE id= :id";
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
            $this->pdo->update('users',$data,$strWhere);
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function getActiveStatus()
	{
		try {
			$strSql = "SELECT u.*, s.status as status,r.name as role FROM users u INNER JOIN  statuses s ON s.id=u.status_id INNER JOIN roles r ON r.id = u.rol_id WHERE u.status_id = 1 ORDER BY u.id ASC";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
}
