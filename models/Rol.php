<?php

/**
 * Modelo de Usuario
 */
class Rol
{
	private $id;
	private $name;
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
			$strSql = "SELECT r.*, s.status as status FROM roles r INNER JOIN  statutes s  ON s.id=r.status_id ";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	public function getActiveRoles()
	{
		try {
			$strSql = "SELECT r.*, s.status as status FROM roles r INNER JOIN  statutes s  ON s.id=r.status_id WHERE s.id=1 ";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	public function activeRol($data)
	{
		try {
			$strWhere='id='.$data['id'];
			$this->pdo->activate('roles',$strWhere);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	public function inactiveROL($data)
	{
		try {
			$strWhere = 'id=' . $data['id'];
			$this->pdo->inactivate('roles', $strWhere);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	public function getById($id)
	{
		try {
			$strsql="SELECT * FROM roles WHERE id= :id";
			$array =['id'=>$id];
			$query=$this->pdo->select($strsql,$array);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
}
