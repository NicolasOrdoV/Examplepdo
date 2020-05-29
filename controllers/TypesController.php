<?php
require 'models/Types.php';
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
        require 'views/layout.php';
        $types=$this->model->getAll();
        require 'views/types/list.php';
    }

}    