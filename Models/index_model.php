<?php

	class index_Model extends Model
	{

		public function __construct()
		{
			parent::__construct();
		}
		
		public function index()
		{
			$products = $this->db->select("SELECT product.*,product_category.description FROM product INNER JOIN product_category ON product.cat_id = product_category.id");

			return $products;
		}

		public function deleteProduct($id)
		{
			$this->db->delete('product', "product_id = '{$id}'", 1);
		}

		public function insertProduct($product)
		{
			$this->db->insert('product',array('name' => $product->getProductName(), 'cat_id' => $product->getCategory(),  'short_desc'=> $product->getShortDescription(), 'long_desc'=> $product->getLongDescription()));
		}

		public function selectAllCategory()
		{
			$category = $this->db->select('SELECT * FROM product_category');

			return $category;
		}
	}