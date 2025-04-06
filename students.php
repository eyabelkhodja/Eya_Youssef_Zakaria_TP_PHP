<?php
session_start();
require 'database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <link rel="stylesheet" href="styleTpPHP.css">
</head>
<body>
    <div class="tab-bar">
        <label id="sms">Students Management System</label>
        <div class="tabs">
        <a href="homePage.php">Home</a>
        <a href="students.php" class="active">Students</a>
        <a href="sections.php">Sections</a>
        <a href="loginPage.php">Logout</a>
        </div>
    </div>
    <?php
    require_once'tableClasses.php';

    $statement = $pdo->query("SELECT * FROM etudiant");
    $studentsData = $statement->fetchAll(PDO::FETCH_ASSOC);

    $etudiants = [];
    foreach ($studentsData as $studentdata) {
        $etudiant = new etudiant($studentdata['id'], $studentdata['name'], $studentdata['birthday'],NULL, $studentdata['section']);
        $etudiants[] = $etudiant;} // Assuming a static method to fetch all students

    foreach ($etudiants as $etudiant): ?>
        <table>
            <td><?= htmlspecialchars($etudiant->getId()) ?></td>
            <td><?= htmlspecialchars($etudiant->getName()) ?></td>
            <td><?= htmlspecialchars($etudiant->getBirthday()) ?></td>
            <td><?= htmlspecialchars($etudiant->getSection()) ?></td>
            <td>
                <form action="detailEtudiant.php" method="POST">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($etudiant->getId()) ?>">
                    <button type="submit" id="details"> 🛈 Détails</button>
                </form>
            </td>
        </table>
    <?php endforeach; ?>
</body>
</html>
