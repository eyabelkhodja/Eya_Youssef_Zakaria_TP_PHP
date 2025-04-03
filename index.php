<?php
require 'database.php';

// Récupérer les étudiants depuis la base de données
$statement = $pdo->query("SELECT * FROM student");
$students = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Étudiants</title>
    <link rel="stylesheet" href="styleTpPHP.css">
</head>

<body>

    <h2>Liste des Étudiants</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Date de naissance</th>
        </tr>
        <?php foreach ($students as $student): ?>
            <tr>
                <td><?= htmlspecialchars($student['id']) ?></td>
                <td><?= htmlspecialchars($student['name']) ?></td>
                <td><?= htmlspecialchars($student['birthday']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>