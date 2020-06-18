<?php
require 'models/Types.php';
require 'models/Login.php';
/**
 * Tipos de Estados
 */
class TypesController
{
    private $model;

    public function __construct()
    {
        $this->model=new Types;
    }
    public function index()
    {
        if (isset($_SESSION['user'])){
            require 'views/layout.php';
            $types=$this->model->getAll();
            require 'views/types/list.php';
        }else{
            header('Location: ?controller=login');
        }
    }

}    