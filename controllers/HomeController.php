<?php
	
	/**
	 * Clase Controlador de Inicio
	 */
	class HomeController
	{		
		public function index()
		{
			require 'views/layout.php';
			require 'views/home.php';		
		}
	}
	?>