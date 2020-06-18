<?php
require 'models/Status.php';
/**
 * Estados
 */
class StatusController
{
    private $model;

    public function __construct()
    {
        $this->model=new Status;
    }
    public function index()
    {
        if (isset($_SESSION['user'])) {
             require 'views/layout.php';
            $statuses=$this->model->getAll();
            require 'views/statutes/list.php';
        }else{
            header('Location: ?controller=login');
        }
    }
    public function new()
    {
        if (isset($_SESSION['user'])) {
            require 'views/layout.php';
            require 'views/statutes/new.php';
        }else{
            header('Location: ?controller=login');
        } 
    }
    public function save()
    {
        $this->model->newStatus($_REQUEST);
        header('Location: ?controller=status');
    }
    public function edit()
    {
        if (isset($_SESSION['user'])) {
            if(isset($_REQUEST)){
            $id=$_REQUEST['id'];

            $data=$this->model->getById($id);
            require 'views/layout.php';
            require 'views/statutes/edit.php';
            }else{
                echo "Error, no se realizo.";
            }
        }else{
           header('Location: ?controller=status'); 
        }
    }
    public function update()
    {
        if(isset($_POST)){
            $this->model->editStatus($_POST);
            header('Location: ?controller=status');
        }else{
            echo "Error, no se realizo";
        }
    }
    public function delete()
    {
        $this->model->deleteStatus($_REQUEST);
        header('Location: ?controller=status');
    }
}
?>