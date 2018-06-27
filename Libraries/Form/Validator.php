<?php

	class Validator
	{

		public function __construct()
		{



		}

		public function maxlength($data, $arg)
		{
			if(strlen($data) > $arg)
			{
				return 'Invalid input.';
			}
		}

		public function __call($name, $arguments)
		{
			throw new Exception($name."doest not exist inside ".__CLASS__);
		}

	}