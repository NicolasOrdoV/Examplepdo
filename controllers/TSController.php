<?php
require 'models/TypeStatus.php';

/**
 * controlador de tipos de estado
 */

class TSController
{
    private $model;

    public function __construct()
    {
        $this->model = new TypeStatus;
    }

    public function index()
    {
        if (isset($_SESSION['user'])) {
            if ($_SESSION['user']->role === 'Administrador') {
                require 'views/layout.php';
                $ts = $this->model->getAll();
                require 'views/type_statutes/list.php';
            } else {
                header('Location: ?controller=home');
            }
        } else {
            header('Location: ?controller=login');
        }
    }

    public function new()
    {
        if ( isset( $_SESSION['user'] ) ) {
            if ( $_SESSION['user']->role === 'Administrador' ) {
                require 'views/layout.php';
                require 'views/type_statutes/new.php';
            } else {
                header('Location: ?controller=home');
            }
        } else {
            header('Location: ?controller=login');
        }
    }

    public function save()
    {
        if ( isset( $_SESSION['user'] ) ) {
            if ( $_SESSION['user']->role === 'Administrador' ) {
                $this->model->newTS($_REQUEST);
                header('Location: ?controller=ts');
            } else {
                header('Location: ?controller=home');
            }
        } else {
            header('Location: ?controller=login');
        }
    }

    public function edit()
    {
        if ( isset( $_SESSION['user'] ) ) {
            if ( $_SESSION['user']->role === 'Administrador' ) {
                if (isset($_REQUEST['id'])) {
                    $id = $_REQUEST['id'];

                    $data = $this->model->getById($id);
                    require 'views/layout.php';
                    require 'views/type_statutes/edit.php';
                } else {
                    echo 'ERROR';
                }
            } else {
                header('Location: ?controller=home');
            }
        } else {
            header('Location: ?controller=login');
        }
    }

    public function update()
    {
        if ( isset( $_SESSION['user'] ) ) {
            if ( $_SESSION['user']->role === 'Administrador' ) {
                if (isset($_POST)) {
                    $this->model->editTS($_POST);
                    header('Location: ?controller=ts');
                } else {
                    echo 'ERROR';
                }
            } else {
                header('Location: ?controller=home');
            }
        } else {
            header('Location: ?controller=login');
        }
    }

    public function delete()
    {
        if ( isset( $_SESSION['user'] ) ) {
            if ( $_SESSION['user']->role === 'Administrador' ) {
                $this->model->deleteTS($_REQUEST);
                header('Location: ?controller=ts');
            } else {
                header('Location: ?controller=home');
            }
        } else {
            header('Location: ?controller=login');
        }
    }
}
