<?php

	#  https://www.w3schools.com/php/php_mysql_select.asp
    $host = 'mysql-server'; // tên mysql server
    $user = 'root';
    $pass = 'root';
    $db = 'demo'; 
    $conn = new mysqli($host, $user, $pass, $db);
    $conn->set_charset("utf8");
?>
