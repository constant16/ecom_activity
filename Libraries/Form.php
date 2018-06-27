<?php

	class Form
	{

		private $current_item = null;
		private $post_data = array();
		private $error = array();

		public function __construct()
		{
			$this->val = new Validator();
		}

		public function post($field)
		{
			$this->post_data[$field] = $_POST[$field];
			$this->current_item = $field;

			return $this;
		}

		public function fetch($field_name = false)
		{

			if($field_name)
			{
				if(isset($this->post_data[$field_name]))
					return $this->post_data[$field_name];
				else
					return false;
			}
			else
				return $this->post_data;

		}

		public function validate($validator_type, $arg)
		{
			$post_item = $this->post_data[$this->current_item];
			$error = $this->val->{$validator_type}($post_item);

			if($error)
			{
				$this->error[$this->current_item] = $error;
			}

			return $this;
		}

		public function submit()
		{

			if(empty($this->error))
			{
				return true;
			}
			else
			{
				$e = "";
				foreach ($this->error as $key => $value) {
					$e .= $key . '=>' . $value . "\n";
				}
				throw new Exception($e);
				
			}
		}

	}