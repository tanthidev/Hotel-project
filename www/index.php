<?php
	session_start();
	ob_start();
	require_once "./mvc/connect.php";

	
	$path = ltrim($_SERVER['REQUEST_URI'], '/');    // Trim leading slash(es)
    $elements = explode('/', $path);                // Split path on slashes
	$_GET["url"] = $path;
    
	
	$myapp = new app();



?>

