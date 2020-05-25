<?php

require 'models/Category.php';
require 'models/Status.php';

class CategoryController
{
    private $model;
    private $status;

    public function __construct()
    {
        $this->model = new Category;
        $this->status=new Status;
    }
    public function index()
    {
        require 'views/layout.php';
        $categories = $this->model->getAll();
        require 'views/categories/list.php';
    }
    public function new()
    {
        require 'views/layout.php';
        require 'views/categories/new.php';
    }
    public function save()
    {
        $this->model->newCategory($_REQUEST);
        header('Location: ?controller=category');
    }
    public function edit()
    {
        if (isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];

            $data = $this->model->getById($id);
            $statuses = $this->status->getAll();
            require 'views/layout.php';
            require 'views/categories/edit.php';
        } else {
            echo "Error, no se realizo.";
        }
    }
    public function update()
    {
        if (isset($_POST)) {
            $this->model->editCategory($_POST);
            header('Location: ?controller=category');
        } else {
            echo "Error, no se realizo.";
        }
    }
    public function delete()
    {
        $this->model->deleteCategory($_REQUEST);
        header('Location: ?controller=category');
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
        header('Location: ?controller=category');

    }
}
