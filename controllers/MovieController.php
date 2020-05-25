<?php
require 'models/Movie.php';
require 'models/Status.php';
require 'models/User.php';
/**
 * 
 */
class MovieController
{
    private $model;
    private $users;
    private $status;

    public function __construct()
    {
        try{
            $this->model=new Movie;
            $this->users=new User;
            $this->status=new Status;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
    public function index(){
        require 'views/layout.php';
        $movies=$this->model->getAll();
        require 'views/movies/list.php';
    }
    public function new()
    {
        require 'views/layout.php';
        $users=$this->users->getAll();
        require 'views/movies/new.php';
    }
    public function save()
    {
        $this->model->newMovie($_REQUEST);
        header('Location: ?controller=movie');
    }
    public function edit()
    {
        if(isset($_REQUEST['id'])){
            $id=$_REQUEST['id'];
            $data=$this->model->getById($id);
            $users=$this->users->getActiveStatus();
            $statuses=$this->status->getAll();
            require 'views/layout.php';
            require 'views/movies/edit.php';
        }else{
            echo "Error, no se realizo.";
        }
    }
    public function update()
    {
        if(isset($_POST)){
            $this->model->editMovie($_POST);
            header('Location: ?controller=movie');
        }else{
            echo "Error, no se realizo";
        }
    }
    public function delete()
    {
        $this->model->deleteMovie($_REQUEST);
        header('Location: ?controller=movie');
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
        header('Location: ?controller=movie');

    }

}