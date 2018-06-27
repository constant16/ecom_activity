<?php

	class CategoryC
	{
		private $category_name, $cat_desc;
		function __construct($category_name, $description)
		{
			$this->cat_desc = $description;
			$this->category_name = $category_name;
		}

		function getCatDescription()
		{
			return $this->cat_desc;
		}

		function getCategoryName()
		{
			return $this->category_name;
		}
	}