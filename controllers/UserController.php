<?php

require 'models/User.php';
require 'models/Status.php';
require 'models/Role.php';
require 'models/Login.php';

/**
 * 
 */
class UserController
{

	private $model;
	private $status;
	private $roles;

	public function __construct()
	{
		$this->model = new User;
		$this->status = new Status;
		$this->role = new Role;
	}

	public function index()
	{
		if (isset($_SESSION['user'])) {
			require 'views/layout.php';
			$users = $this->model->getAll();
			require 'views/users/list.php';
		}else{
			header('Location: ?controller=login');
		}
	}

	public function new()
	{
		if (isset($_SESSION['user'])) {
			require 'views/layout.php';
			$roles = $this->role->getActiveRoles();
			require 'views/users/new.php';
		}else{
			header('Location: ?controller=login');
		}	
	}
	public function save()
	{
		$this->model->newUser($_REQUEST);
		header('Location: ?controller=user');
		
	}
	public function edit()
	{
		if (isset($_SESSION['user'])) {
			if (isset($_REQUEST['id'])) {
				$id = $_REQUEST['id'];
				$data = $this->model->getById($id);
				$statuses = $this->status->getAll();
				$roles = $this->role->getActiveRoles();
				require 'views/layout.php';
				require 'views/users/edit.php';
			} else {
				echo "Error, no se realizo";
			}
		}else{
			header('Location: ?controller=login');
		}
	}
	public function update()
	{
		if (isset($_POST)) {
			$this->model->editUser($_POST);
			header('Location: ?controller=user');
		} else {
			echo "Error, no se realizo";
		}
	}
	public function delete()
	{
		$this->model->deleteUser($_REQUEST);
		header('Location: ?controller=user');
	}

	public function updateStatus()
    {
        $role = $this->model->getById($_REQUEST['id']);
        $data = [];

        if($role[0]->status_id == 1) { 
            $data = [
                'id' => $role[0]->id,
                'status_id' => 2
            ];
        } elseif($role[0]->status_id == 2) {
            $data = [
                'id' => $role[0]->id,
                'status_id' => 1
            ];
        }

        $this->model->editStatus($data);
        header('Location: ?controller=user');

    }
}
