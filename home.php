<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST</title>
</head>
<body>
    this is the home page <br>
    <a href="index.php">login</a> <br>
    <form action="home.php" method="post">
    <input type="submit" name="logout" value="logout">
    </form>
</body>
</html>
<?php
    echo $_SESSION['username'] . "<br>";
    echo $_SESSION['password'];
    if(isset($_POST["logout"])){
        session_destroy();
        header("location:index.php");
    }
?>
<?php
    foreach($_SERVER as $key => $value){
        echo "{$key} = {$value} <br>";
    }
?>