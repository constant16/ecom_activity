<?php

	require 'Config/paths.php';
	require 'Config/database.php';
	require 'Config/constants.php';
	require 'Libraries/Form/Validator.php';

	function __autoload($class)
	{
		require LIBS . $class .".php";
	}

//	require 'Libraries/Bootstrap.php';
//	require 'Libraries/Model.php';	
//	require 'Libraries/Controller.php';
//	require 'Libraries/View.php';
	
//	require 'Libraries/Database.php';
//	require 'Libraries/Session.php';

	$bootstrap = new Bootstrap();
	$bootstrap->setControllerPath('/Controllers');
	$bootstrap->setModelPath('/Models');
	$bootstrap->init();