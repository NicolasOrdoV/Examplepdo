<?php

/**
 * modelo de peliculas
 */
class Login
{

    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new Database;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function validateUser($date)
    {
        try {
            $strSql = "SELECT u.* s.status as status, r.name as role FROM users INNER JOIN statuses s ON s.id = u.status_id INNER JOIN roles r ON r.id = u.role_id WHERE u.email = '{$data['email']}' AND u.password = '{$data['password']}' AND u.status_id = 1";
            $query = $this->pdo->select($strSql);
            if (isset($query[0]->id)) {
                $_SESSION['user'] = $query[0];
                return true;
            }else{
                return 'Error al iniciar sesion, verifique sus datos';
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}   
