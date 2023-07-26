
<?php
	session_start();	
    require_once('connect.php');

    
if(isset($_SESSION['username'])){
    $username=$_SESSION['username'];

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
         
         <th><b>End Date</b></th >
         <th><b>Description</b></th >
         
         <th><b>Phase</b></th >
     </tr>

		<?php

			while  ($row =  $rows->fetch())	{
				echo  "<tr><td >" . $row['pid'] . "</td>";

				echo  "<td>" . $row['title'] . "</td>";

				echo  "<td>" . $row['start_date'] . "</td>";
                
				echo  "<td>" . $row['end_date'] . "</td>";
                
				echo  "<td>" . $row['description'] . "</td>";
                
				echo "<td>". $row['phase'] . "</td></tr>\n";
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
}

?>


<link rel="stylesheet" href="style.css">
<p>Done? <a href="logout.php">Logout</a>  </p>


<p>Add a new project? <a href="add.php">Add</a>  </p>


<p>Update a project? <a href="update.php">Update</a>  </p>


<p> Want to go back? <a href="index.php"> Home</a> </p>