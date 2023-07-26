<?php

	session_start();
	unset($_SESSION["username"]);
	session_destroy();

?>

<link rel="stylesheet" href="style.css">
 <H2> Logged Out </H2> 

<p> Want to login? <a href="login.php"> Login Now</a> </p>


<p> Return back? <a href="index.php"> Home</a> </p>