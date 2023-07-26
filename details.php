<?php
session_start();
require_once('connect.php');

  $projectid = $_GET['pid'];

    $query = "SELECT * FROM projects WHERE pid = $projectid";
    $rows=$db->query($query);

    if ( $rows && $rows->rowCount()> 0) {
    ?>

      <table id="projects" >
        <tr><th><b>Title</b></th> 
        <th><b>Start Date</b></th >
        <th><b>End Date</b></th>
        <th><b>Description</b></th >
        <th><b>Phase</b></th ></tr>

    <?php

    while ($row = ($rows)->fetch() ) {
      echo  "<tr><td>" . $row['title'] . "</td>";
      echo  "<td>" . $row['start_date'] . "</td>";
      echo  "<td>" . $row['end_date'] . "</td>";
      echo "<td>". $row['description'] . "</td>";
      echo  "<td>" . $row['phase'] . "</td></tr>\n";
    }
    echo '</table>';

}
else {
    header('Location: index.php');
    exit;
}

?>

<link rel="stylesheet" href="style.css">
<p> Do you want to go back? <a href="index.php">Homepage</a> </p>


