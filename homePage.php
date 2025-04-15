<?php
session_start();
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
    <h2>Here are the actions you can make:</h2>
    <ul>
        <li>You can check out our students' database by clicking <a href="students.php">here</a><br>
    If you're a simple user, then you'll only be able to access this database in reading mode</li>
        <li>You can check out our sections' database by clicking <a href="sections.php">here</a></li>
    </form>
</body>
    <footer>
        <p>© 2025 Students Management System. All rights reserved.</p>
    </footer>
</html>