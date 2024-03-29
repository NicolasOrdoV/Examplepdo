<?php
require 'models/Movie.php';
require 'models/Status.php';
require 'models/User.php';
require 'models/Category.php';
/**
 * 
 */
class MovieController
{
    private $model;
    private $users;
    private $status;
    private $category;

    public function __construct()
    {
        try{
            $this->model=new Movie;
            $this->users=new User;
            $this->status=new Status;
            $this->category=new Category;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
    public function index(){
        if (isset($_SESSION['user'])) {
            require 'views/layout.php';
            $movies = $this->model->getAll();
            $categories = $this->category->getAllC();
            require 'views/movies/list.php';
        }else{
            header('Location: ?controller=login');
        }
    }
    public function new()
    {
        if (isset($_SESSION['user'])) {
            require 'views/layout.php';
            $users=$this->users->getAll();
            $categories=$this->category->getAll();
            require 'views/movies/new.php';
        }else{
            header('Location: ?controller=login');
        }  
    }
    public function save()
    {
        //Organizar la informacion del request
        $dataMovie = [
            'name' => $_POST['name'],
            'img'=>$_POST['img'],
            'description' => $_POST['description'],
            'user_id' => $_POST['user_id'],
            'status_id' => 1
        ];
        //datos de las categorias de category_movie
        $arrayCategories = $_POST['categories'];
        //insertar movie
        $respNewMovie = $this->model->newMovie($dataMovie);
        //Obtener el ultimo id registrado
        $lastId = $this->model->getLastId();
        $arrayResp = [];
        if (isset($lastId[0]->id) && $respNewMovie == true) {
            //Insercion de la nueva categoria
            $respNewCategoryMovie = $this->model->saveCategoryMovie($arrayCategories, $lastId[0]->id);
            if ($respNewCategoryMovie == true) {
                $arrayResp = [
                 'success' => true,
                 'message' => 'Pelicula creada'
               ];
            }else{
               $arrayResp = [
                 'error' => true,
                 'message' => 'error ingresando la pelicula'
               ]; 
            }
        }else{
           $arrayResp = [
             'error' => true,
             'message' => 'Error ingresando la pelicula'.$dataMovie
           ];
        }
        echo json_encode($arrayResp);
        return;
    }
    public function edit()
    {
        if (isset($_SESSION['user'])) {
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
        }else{
            header('Location: ?controller=login');
        }  
    }

    public function view()
    {
        if (isset($_SESSION['user'])) {
            if (isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $data = $this->model->getById($id);
            $users=$this->users->getAll();
            $categories=$this->category->getAll();
            require 'views/layout.php';
            require 'views/movies/view.php';
            } else {
                echo "Error, no se realizo";
            }
        }else{
            header('Location: ?controller=login');
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
