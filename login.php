<?php
session_start();
require_once("connect.php");

    if(isset($_POST['submitted'])){
        if(!isset($_POST['username'], $_POST['password'])){
            exit('Fill both username and password');
        }

        
        try{
            $statement = $db->prepare('SELECT password FROM users WHERE username = ?');
            $statement->execute(array($_POST['username']));
            

            if($statement->rowCount()>0){
                $row=$statement->fetch();
                if(password_verify($_POST['password'], $row['password'])){
              

                    $_SESSION["username"]=$_POST['username'];
                    header("Location:registered.php");
                    exit();
                } 
                else
                {
                    echo "<p>Incorrect password</p>";
                }
            } 
            else 
            {
                echo "<p>Incorrect username</p>";
            }
        }
        catch(PDOException $ex) {
            echo("Failed to connect to the database.<br>");
            echo($ex->getMessage());
            exit;
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    
    <link rel="stylesheet" href="style.css">
</head>
<body>

<form method="post" action="login.php">
        <input type="text" name="username"
        placeholder="Username"/>

        <input type="password" name="password"
        placeholder="Password"/>

        <input type="submit" value="Log in"/>
        <input type="hidden" name="submitted" value="true"/>
     </form>
    
     
<div class = 'register'> <p> Not a user? <a href="register.php"> Register Now</a> </p> </div>

<div class = 'register'> <p> Want to go back? <a href="index.php"> Home</a> </p> </div>
</body>
</html>