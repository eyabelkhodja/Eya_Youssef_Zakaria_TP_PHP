<?php
require 'database.php';

if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
    die("Accès non autorisé ou ID invalide.");
}

$id = intval($_POST['id']);

$statement = $pdo->prepare("SELECT * FROM student WHERE id = :id");
$statement->execute(['id' => $id]);
$student = $statement->fetch(PDO::FETCH_ASSOC);

if (!$student) {
    die("Étudiant non trouvé.");
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Étudiant</title>
    <link rel="stylesheet" href="styleTpPHP.css">
</head>

<body>

    <h2 id="details">Détails de l'Étudiant</h2>

    <p><strong>Nom :</strong> <?= htmlspecialchars($student['name']) ?></p>
    <p><strong>Date de naissance :</strong> <?= htmlspecialchars($student['birthday']) ?></p>

    <a href="index.php">⬅ Retour à la liste</a>

</body>

</html>
