<?php

require 'models/Login.php';

class LoginController
{
	private $model;

	public function __construct()
	{
		$this->model = new Login;
	}
	public function index()
    {
        if (iseet($_SESSION['user'])) {
            header('location:?controller=home');
        }else{
            require 'views/login.php';
        }
    }

    public function login()
    {
    	$validateUser = $this->model->validateUser($_POST);
    	if ($validateUser === true) {
    		header('location: ?controller=home');
    	}else{
    		$error = [
                'errorMessage' => $validateUser,'email' => $_POST['email']
    		         ];
    		require 'views/login.php';
    	}
    }

    public function logout()
    {
    	if ($_SESSION['user']) {
    		session_destroy();
    		header('location:?controller=login');
    	}else{
    		header('location:?controller=login');
    	}
    }
	
}