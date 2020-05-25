<?php

require 'models/User.php';
require 'models/Status.php';
require 'models/Rental.php';


/**
 * Rentals
 */
class RentalController
{

	private $model;
	private $status;
	private $users;

	public function __construct()
	{
		$this->model = new Rental;
		$this->status = new Status;
		$this->user = new User;
	}

	public function index()
	{
		require 'views/layout.php';
		$rentals = $this->model->getAll();
		require 'views/rentals/list.php';
	}

	public function new()
	{
		require 'views/layout.php';
		$users = $this->user->getAll();
		require 'views/rentals/new.php';
	}
	public function save()
	{
		$this->model->newRental($_REQUEST);
		header('Location: ?controller=rental');
		
	}
	public function edit()
	{
		if (isset($_REQUEST['id'])) {
			$id = $_REQUEST['id'];
			$data = $this->model->getById($id);
			$users=$this->user->getActiveStatus();
			require 'views/layout.php';
			require 'views/rentals/edit.php';
		} else {
			echo "Error, no se realizo";
		}
	}
	public function update()
	{
		if (isset($_POST)) {
			$this->model->editRental($_POST);
			header('Location: ?controller=rental');
		} else {
			echo "Error, no se realizo";
		}
	}
	public function delete()
	{
		$this->model->deleteRental($_REQUEST);
		header('Location: ?controller=rental');
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
        header('Location: ?controller=rental');
    }
}    