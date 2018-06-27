<?php

	/*
		Controller index class
	*/

	class index extends Controller
	{
		function __construct()
		{

			parent::__construct();		
			//echo 'We are in index';
		}

		function index()
		{
			$this->view->products = $this->model->index();
			$this->view->title = 'Products';
			$this->view->render('header');
			$this->view->render('index/index');
			$this->view->render('footer');
		}

		function addProduct()
		{
			$this->view->categories = $this->model->selectAllCategory();
			$this->view->title = 'Products';
			$this->view->render('header');
			$this->view->render('index/add');
			$this->view->render('footer');
		}

		function deleteProduct($product_id=false)
		{
			$this->model->deleteProduct($product_id);
			header('Location: '.URL.'index');
		}


		function insertProduct()
		{
			$pname = filter_var($_POST['product_name'], FILTER_SANITIZE_STRING);
			$category = filter_var($_POST['category'], FILTER_SANITIZE_STRING);
			$shortd = filter_var($_POST['prod_shortd'], FILTER_SANITIZE_STRING);
			$longd = filter_var($_POST['prod_longd'], FILTER_SANITIZE_STRING);
			$product = new Product($pname,$category,$shortd,$longd);
			$this->model->insertProduct($product);

			header('Location: '.URL.'index');
		}
	}