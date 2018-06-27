<?php

	class Category_Model extends Model
	{

		public function __construct()
		{
			parent::__construct();
		}
		
		public function index()
		{
			$category = $this->db->select('SELECT * FROM product_category');

			return $category;
		}

		public function deleteCategory($id)
		{
			$this->db->delete('product_category', "id = '{$id}'", 1);
		}

		public function insertCategory($category)
		{
			$this->db->insert('product_category',array('name' => $category->getCategoryName(), 'description' => $category->getCatDescription()));
		}

		public function selectAllCategory()
		{
			$category = $this->db->select('SELECT * FROM product_category');

			return $category;
		}
	}