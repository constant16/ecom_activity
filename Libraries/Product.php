<?php

	/*
		Controller index class
	*/

	class Product
	{
		private $product_name,$shortd,$longd,$category;
		function __construct($product_name,$category,$shortd,$longd)
		{
			$this->product_name = $product_name;
			$this->shortd = $shortd;
			$this->longd = $longd;
			$this->category = $category;
		}

		function getProductName()
		{
			return $this->product_name;
		}

		function getCategory()
		{
			return $this->category;
		}

		function getShortDescription()
		{
			return $this->shortd;
		}

		function getLongDescription()
		{
			return $this->longd;
		}
	}