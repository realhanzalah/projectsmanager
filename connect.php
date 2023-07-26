<?php

$host = 'localhost';
$db_name = 'u_220070614_portfolio';
$username = 'u-220070614';
$password = 'VqWHG4wqRCP9yua';

try {
	$db = new PDO("mysql:dbname=$db_name;host=$host", $username, $password); 

} catch(PDOException $ex) {
	echo("Failed to connect to the database.<br>");
	echo($ex->getMessage());
	exit;
}
?>
