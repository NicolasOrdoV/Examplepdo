<?php

require 'models/User.php';
require 'models/Status.php';
require 'models/Rental.php';
require 'models/Movie.php';


/**
 * Alquileres
 */
class RentalController
{

	private $model;
	private $status;
	private $users;
	private $movies;

	public function __construct()
	{
		$this->model = new Rental;
		$this->status = new Status;
		$this->user = new User;
		$this->movie = new Movie;
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
		$movies = $this->movie->getAll();
		require 'views/rentals/new.php';
	}
	public function save()
	{
		//Organizar la informacion del request
        $dataRental = [
            'start_date' => $_POST['start_date'],
            'end_date' => $_POST['end_date'],
            'total' => $_POST['total'],
            'user_id' => $_POST['user_id'],
            'status_id' => 1
        ];
        //datos de las categorias de movie_rental
        $arrayMovies = $_POST['movies'];
        //insertar movie
        $respNewRental = $this->model->newRental($dataRental);
        //Obtener el ultimo id registrado
        $lastId = $this->model->getLastId();
        $arrayResp = [];
        if (isset($lastId[0]->id) && $respNewRental == true) {
            //Insercion de la nueva categoria
            $respNewMovieRental = $this->model->saveMovieRental($arrayMovies, $lastId[0]->id);
            if ($respNewMovieRental == true) {
                $arrayResp = [
                 'success' => true,
                 'message' => 'Alquiler creado'
               ];
            }else{
               $arrayResp = [
                 'error' => true,
                 'message' => 'error ingresando el alquiler'
               ]; 
            }
        }else{
           $arrayResp = [
             'error' => true,
             'message' => 'Error ingresando el alquiler'
           ];
        }
        echo json_encode($arrayResp);
        return;	
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

	public function view()
	{
		if (isset($_REQUEST['id'])) {
			$id = $_REQUEST['id'];
			$data = $this->model->getById($id);
			$users=$this->user->getActiveStatus();
			$movies=$this->movie->getAll();
			require 'views/layout.php';
			require 'views/rentals/view.php';
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