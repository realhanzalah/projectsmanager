
<?php
	session_start();	
    require_once('connect.php');

	try {
		$query="SELECT  * FROM  projects ";
		
		$rows =  $db->query($query);
		
		if ( $rows && $rows->rowCount()> 0) {
		
		?>	

	<table id="projects" >
	  <tr>
		
	  <th><b>Project ID</b></th>
         <th><b>Title</b></th>
         <th><b>Start Date</b></th >
         <th><b>Description</b></th >
     </tr>

		<?php

			while  ($row =  $rows->fetch())	{
				echo  "<tr><td >" . $row['pid'] . "</td>";
				echo  "<td>" . $row['title'] . "</td>";
				echo  "<td>" . $row['start_date'] . "</td>";
				echo "<td>". $row['description'] . "</td>\n";
				echo "<td><a href='details.php?pid=" . $row['pid'] . "'id='details'>View Details</a></td>";
              echo "</tr>";
			}
			echo  '</table>';
		}
		else {
			echo  "<p>You need to log in. </p>\n"; 
		}
	}
	catch (PDOexception $ex){
        echo("Failed to connect to the database.<br>");
        echo($ex->getMessage());
        exit;
	}

?>	

<link rel="stylesheet" href="style.css">
   <p>Would you like to register? <a href="register.php">Register</a>  </p>
   
   <p>Already registered? Log in now. <a href="login.php">Login</a>  </p>

   <p>Do you want to search through the projects? <a href="search.php">Search</a>  </p>

   
