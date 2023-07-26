<?php
session_start();
require_once('connect.php');


if (isset($_POST['submitted'])) {
    $title = $_POST['title'];
    $start_date = $_POST['start_date'];

    $query = "SELECT * FROM projects WHERE start_date = '$start_date' OR title = '$title'"; 
    $rows=$db->query($query);

    if ( $rows && $rows->rowCount()> 0) {
		
		?>	

	<table id="projects" >
	  <tr>
         <th><b>Title</b></th>
         <th><b>Start Date</b></th >
         <th><b>Description</b></th >
     </tr>

		<?php

			while  ($row =  $rows->fetch())	{
				echo  "<tr><td>" . $row['title'] . "</td>";
				echo  "<td>" . $row['start_date'] . "</td>";
				echo  "<td>" . $row['description'] . "</td>";
			}
			echo  '</table>';
		}
		else {
			echo  "<p>You need to log in. </p>\n"; 
		}
  }

?>

<div class = 'register'> <p>Log in to add a project <a href="login.php">Log in</a></p> </div>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search the Projects</title>
    
    <link rel="stylesheet" href="style.css">
</head>
<body>

<form method="post" action="search.php">
        <input type="text" name="title"
        placeholder="Title"/>

        <input type="date" name="start_date">

        <input type="submit" value="Search"/>
        <input type="hidden" name="submitted" value="true"/>
     </form>
    
     
<div class = 'register'> <p> Do you want to go back? <a href="index.php">Home</a> </p> </div>
</body>
</html>