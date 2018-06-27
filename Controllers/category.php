<?php

	/*
		Controller index class
	*/

	class Category extends Controller
	{
		
		function __construct()
		{

			parent::__construct();
			//echo 'We are in index';
		}

		function index()
		{
			$this->view->categories = $this->model->index();
			$this->view->title = 'Categories';
			$this->view->render('header');
			$this->view->render('category/index');
			$this->view->render('footer');
		}

		function addCategory()
		{
			$this->view->title = 'Categories';
			$this->view->render('header');
			$this->view->render('category/add');
			$this->view->render('footer');
		}

		function deleteCategory($category_id=false)
		{
			$this->model->deleteCategory($category_id);
			header('Location: '.URL.'category');
		}


		function insertCategory()
		{
			$cname = filter_var($_POST['category_name'], FILTER_SANITIZE_STRING);
			$description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
			$category = new CategoryC($cname,$description);
			$this->model->insertCategory($category);

			header('Location: '.URL.'category');
		}
	}