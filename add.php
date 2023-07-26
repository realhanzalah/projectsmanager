<?php
session_start();
require_once('connect.php');


 if (isset($_POST['submitted'])) {

    $userid = $_POST['uid'];
    $title = $_POST['title'];
    $startdate = $_POST['start_date'];
    $enddate = $_POST['end_date'];
    $description = $_POST['description'];
    $phase = $_POST['phase'];
 

    $query = "INSERT INTO projects (title, start_date, end_date, description, phase, uid) 
    VALUES ('$title', '$startdate', '$enddate', '$description', '$phase', '$userid')";

    if ($db->query($query)){
        header('Location: registered.php');
    }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View More Details</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<form method="post" action="add.php">


        <label> User ID </label>
        <input type="text" name="uid"
        placeholder="User ID"/>

        
        <label> Title </label>
        <input type="text" name="title"
        placeholder="Title"/>

        
        <label> Start </label>
        <input type="date" name="start_date"/>

        
        <label> End </label>
        <input type="date" name="end_date"/>

        
        <label> Project Description </label>
        <textarea name="description" placeholder="Description"></textarea>
        
        
        <label> Current Phase </label>
        <select name="phase" placeholder="Phase">
            <option value="design">Design</option>
            <option value="development">Development</option>
            <option value="testing">Testing</option>
            <option value="deployment">Deployment</option>
            <option value="complete">Complete</option>
        </select>

        <input type="submit" value="Submit"/>

        <input type="hidden" name="submitted" value="true"/>
     </form>
    
</body>
</html>


