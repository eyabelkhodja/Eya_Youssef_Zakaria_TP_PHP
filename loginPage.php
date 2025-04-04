<?php
session_start();
require 'database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Platform</title>
    <link rel="stylesheet" href="styleTpPHP.css">
</head>
<body>
    <div class="tab-bar">
        <label id="sms">Students Management System</label>
        <div class="tabs">
        <a href="homePage.php">Home</a>
        <a href="students.php">Students</a>
        <a href="sections.php">Sections</a>
        <a href="loginPage.php">Logout</a>
    </div>
</div>
    <h1>This is a student management platform!!
        Welcome to all users!
    </h1>
    <h2>Please enter your credentials to log into your account</h2>
    <form action="loginPage.php" method="post">
        <label> ID: </label>
        <input type="password" name="id" required><br>
        <label> Username: </label>
        <input type="text" name="username" required><br>
        <input type="submit" value="Login">
    </form>
    <h2>Don't have an account to sign into?</h2>
    <h3>Click <a href="registerPage.php">here</a> to create an account</h3>
</body>
</html>

<?php
require_once'tableClasses.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST;

    $statement = $pdo->query("SELECT id, username, email, role FROM utilisateur");
    $utilisateurData = $statement->fetchAll(PDO::FETCH_ASSOC);

    $isValid = false;

    $utilisateurs = [];
    foreach ($utilisateurData as $userData) {
        $user = new utilisateur($userData['id'], $userData['username'], $userData['email'], $userData['role']);
        $utilisateurs[] = $user;

        // Validate credentials
        if ($user->getUsername() === $login["username"] && $user->getId() == $login["id"]) {
            $_SESSION['username'] = $login['username'];
            header('Location: homePage.php');
            exit;
        }
    }

    echo "Invalid credentials";
}
?>