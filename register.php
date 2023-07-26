<?php
session_start();
require_once('connect.php');

if(isset($_POST['submitted'])){
    

    $email=$_POST["email"];
    $username=isset($_POST['username'])?$_POST['username']:false;
    $password=isset($_POST['password'])?password_hash($_POST['password'],PASSWORD_DEFAULT):false;

   if(empty($username) || empty($password)){
        echo "<p> Username and Password cannot be blank. </p>";
exit;
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "<p> Incorrect email. </p>";
exit;
    }

    try {
        $statement=$db->prepare("Insert into users values(default,?,?,?)");
        $statement->execute(array($username, $password, $email));

        $uid=$db->lastInsertId();

        $_SESSION['username'] = $username;

        header('Location: registered.php');
        exit;

    } catch (PDOexception $ex) {
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

<form method="post" action="register.php">
        <input type="text" name="username"
        placeholder="Username"/>

        <input type="password" name="password"
        placeholder="Password"/>

        <input type="text" name="email"
        placeholder="Email"/>

        <input type="submit" value="Register"/>
        <input type="hidden" name="submitted" value="true"/>
     </form>
    
     
<div class = 'register'> <p> Already signed up? <a href="login.php"> Login Now</a> </p> </div>


<div class = 'register'> <p> Want to go back? <a href="index.php"> Home</a> </p> </div>
</body>
</html>