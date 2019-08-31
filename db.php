<?php

$dsn = 'mysql:host=localhost;dbname=polo';

$username = 'root';
$password = '';
$options = [];


try {

	$connection = new PDO($dsn,$username,$password,$options);
	


} catch (PDOExeception $e) {



}


?>