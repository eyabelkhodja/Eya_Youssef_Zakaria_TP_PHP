<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokémon Battle</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="combatants">Les combattants</div>
        <table>
            <tr>
                <th>Pokémon</th>
                <th>Stats</th>
            </tr>
            <tr>
                <td>
                    <img src="<?= $url ?>" alt="<?= $nom ?>" class="pokemon-img">
                    <h4><?= $nom ?></h4>
                </td>
                <td>
                    <table>
                        <tr><td><strong>Points:</strong></td><td><?= $hp ?></td></tr>
                        <tr><td><strong>Min Attack Points:</strong></td><td><?= $attackMinimal ?></td></tr>
                        <tr><td><strong>Max Attack Points:</strong></td><td><?= $attackMaximal ?></td></tr>
                        <tr><td><strong>Special Attack:</strong></td><td><?= $specialAttack ?></td></tr>
                        <tr><td><strong>Probability Special Attack:</strong></td><td><?= $probabiliteSpecialAttack ?>%</td></tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
