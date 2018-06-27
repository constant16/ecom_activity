<?php

	/*
		Main controller
	*/
	class Controller
	{
		
		function __construct()
		{
			//echo 'Main Controller<br />';
			$this->view = new View();
			Session::init();
		}

		function loadModel($name)
		{
			$path = 'Models/'.$name.'_model.php';
			if(file_exists($path))
			{
				require 'Models/'.$name.'_model.php';
				$modelName = $name.'_Model';
				$this->model = new $modelName();
			}
		}
	}