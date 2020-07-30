<?php

/**
 * modelo de Login
 */
class Login
{
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new Database;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function validateUser($data)
    {
        try {
            //$data['password'] = hash('sha256', $data['password']);
            $strSql = "SELECT u.*, s.status as status, r.name as role FROM users u INNER JOIN statuses s ON s.id = u.status_id INNER JOIN roles r ON r.id = u.rol_id WHERE u.email = '{$data['email']}' AND u.password = '{$data['password']}' AND u.status_id = 1";

            $query = $this->pdo->select($strSql);

            if(isset($query[0]->id)) {
                $_SESSION['user'] = $query[0];
                return true;
            } else
                return 'Error al Iniciar Sesión. Verifique sus Credenciales';

        } catch (PDOException $e) {
            return $e->getMessage();
        }    
    }
    
}  
