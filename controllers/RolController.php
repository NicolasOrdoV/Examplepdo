<?php
require 'Models/Rol.php';
require 'Models/Status.php';

/**
 * 
 */

 class RolController{
    private $model;

    public function __construct()
    {
        $this->model=new Rol;
    }
    public function index()
    {
        if ( isset( $_SESSION['user'] ) ) {
            if ( $_SESSION['user']->role === 'Administrador' ) {
                require 'views/layout.php';
                $rol=$this->model->getAll();
                require 'views/roles/list.php';
            } else {
                header( 'Location: ?controller=home' );
            }
        } else {
            header( 'Location: ?controller=login' );
        }
    }
    public function activate()
    {
        if ( isset( $_SESSION['user'] ) ) {
            if ( $_SESSION['user']->role === 'Administrador' ) {
                $this->model->activeRol($_REQUEST);
                header('Location: ?controller=rol');
            } else {
                header( 'Location: ?controller=home' );
            }
        } else {
            header( 'Location: ?controller=login' );
        }
    }
    public function inactivate()
    {
        if ( isset( $_SESSION['user'] ) ) {
            if ( $_SESSION['user']->role === 'Administrador' ) {
                $this->model->inactiveROL($_REQUEST);
                header('Location: ?controller=rol');
            } else {
                header( 'Location: ?controller=home' );
            }
        } else {
            header( 'Location: ?controller=login' );
        }
    }
 }
?>