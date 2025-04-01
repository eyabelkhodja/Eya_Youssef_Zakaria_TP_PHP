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
    this is the login page <br>
    <a href="home.php">Home</a> <br>
    <form action="index.php" method="post">
        <input type="text" name="username"><br>
        <input type="password" name="password"><br>
        <input type="submit" name="login"><br>
    </form>

</body>
</html>
<?php
if(isset($_POST["login"])){
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];
    if(!empty($_SESSION['username']) && !empty($_SESSION['password'])){
        echo $_SESSION['username'] . "<br>";
        echo $_SESSION['password'];

        header("location:home.php");

    }
    else{
        echo "Please fill in the fields";
    }
    $password = $_POST['password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);
    if(password_verify($password, $hash)){
        echo "Password is correct";
    }
    else{
        echo "Password is incorrect";
    }
}
?>