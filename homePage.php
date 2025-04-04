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
        <a href="homePage.php" class="active">Home</a>
        <a href="students.php">Students</a>
        <a href="sections.php">Sections</a>
        <a href="loginPage.php">Logout</a>
    </div>
</div>
    <h1>Hello PHP lovers! Welcome to your administration platform</h1>
    <h2>Here are the actions you can make</h2>
    </form>
</body>
</html>