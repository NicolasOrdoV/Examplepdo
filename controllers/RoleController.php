<?php
require 'Models/Role.php';
require 'Models/Status.php';

 
class RoleController{
    private $model;
    private $status;

    public function __construct()
    {
        $this->model = new Role;
        $this->status = new Status;
    }

    public function index()
    {
        require 'views/layout.php';
        $roles = $this->model->getAll();
        require 'views/roles/list.php';
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
        header('Location: ?controller=role');

    }
 }
