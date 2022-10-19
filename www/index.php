<?php
	session_start();
	ob_start();
	
	
	$path = ltrim($_SERVER['REQUEST_URI'], '/');    // Trim leading slash(es)
    $elements = explode('/', $path);                // Split path on slashes
	$_GET["url"] = $path;
	require_once "./mvc/connect.php";
	$myapp = new app();
?>

