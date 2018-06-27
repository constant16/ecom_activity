<?php
	
	/*
	Controller bootstrap
	*/
	class Bootstrap
	{

		private $url = null;
		private $controller = null;

		private $controller_path = 'Controllers';
		private $model_path = 'Models';
		private $error_file = 'error.php';

		public function init()
		{
			$this->get_url();

			if(empty($this->url[0]) || $this->url[0] == 'error')
			{
				$this->load_default_controller();
				return false;
			}
			else
			{
				$isControllerExist = $this->load_controller();
				if($isControllerExist == false)
				  return false;		
			}

			$this->call_controller_method();			
		}

		public function setControllerPath($path)
		{
			$this->controller_path = $path;
		}

		public function setModelPath($path)
		{
			$this->model_path = $path;
		}

		public function setErrorFile($path)
		{
			$this->error_file = $path;
		}

		private function get_url()
		{
			$url = isset($_GET['url']) ? $_GET['url'] : null;
			$url = rtrim($url, '/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$this->url = explode('/', $url);			
		}

		private function load_default_controller()
		{
			require 'Controllers/index.php';
			$this->controller = new Index();
			$this->controller->index();
			//header('Location: index');
		}

		private function make_error($errorType)
		{
				require('Controllers/error.php');
				$this->controller = new ErrorHandler();
				$this->controller->index($errorType);
				return false;
		}

		private function load_controller()
		{
			$file = 'Controllers/'.$this->url[0].'.php';
			if(file_exists($file) == 1)
			{
				require $file;
				$this->controller = new $this->url[0];
				$this->controller->loadModel($this->url[0]);
				return true;
			}
			else
			{
				$this->make_error('PAGE DOES NOT EXIST.');
				return false;
			}
		}

		private function call_controller_method()
		{
			if(isset($this->url[1]))
			{
				if(method_exists($this->controller,$this->url[1]))
				{
					if(isset($this->url[3]))
					{
						$this->controller->{$this->url[1]}($this->url[2],$this->url[3]);			
					}					
					else if(isset($this->url[2]))
					{
						$this->controller->{$this->url[1]}($this->url[2]);			
					}
					else if(method_exists($this->controller,$this->url[1]))
					{
						$this->controller->{$this->url[1]}();
					}
				}
				else
				{
					$this->make_error('UNKNOWN METHOD.');
				}
			}
			else
			{
				$this->controller->index();				
				return false;
			}
		}
	}