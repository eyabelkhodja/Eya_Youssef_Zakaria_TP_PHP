<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Le combat du siecle</title>
</head>
<body>
<?php
   require_once 'Pokemon.php';

   // Création des attaques
   $attaque_Dracaufeu = new AttackPokemon(10, 100, 2, 20);
   $attaque_Carapuce = new AttackPokemon(15, 90, 1.5, 25);
   $attaque_Bulbizarre = new AttackPokemon(12, 85, 1.8, 30);
   $attaque_Pikachu = new AttackPokemon(30, 80, 4, 20);

   // Création des Pokémon
   $Dracaufeu = new PokemonFeu("Dracaufeu", 250, "https://www.pokepedia.fr/images/thumb/8/8b/Dracaufeu_%28Gigamax%29-EB.png/500px-Dracaufeu_%28Gigamax%29-EB.png", $attaque_Dracaufeu);
   $Carapuce = new PokemonEau("Carapuce", 220, "https://www.pokepedia.fr/images/thumb/c/cc/Carapuce-RFVF.png/250px-Carapuce-RFVF.png", $attaque_Carapuce);
   $Bulbizarre = new PokemonPlante("Bulbizarre", 230, "https://www.pokepedia.fr/images/thumb/e/ef/Bulbizarre-RFVF.png/644px-Bulbizarre-RFVF.png?20141212043325", $attaque_Bulbizarre);
   $Pikachu = new Pokemon("Pikachu", 200, "https://archives.bulbagarden.net/media/upload/thumb/8/8c/0025Pikachu-Gigantamax.png/100px-0025Pikachu-Gigantamax.png", $attaque_Pikachu);


   // Fonction pour exécuter un combat
   function combat($p1, $p2) {
    $p1->whoAmI();
    $p2->whoAmI();

    $count = 1;
    
    while (!$p1->isdead() && !$p2->isdead()) {
        echo '<div class="battle-log-container">';
        echo '<table class="battle-table">';
        echo '<tr><th>Round</th><th>' . $p1->getNom() . ' Attacks</th><th>' . $p2->getNom() . ' Attacks</th></tr>';
        echo '<tr>';
        echo '<td>' . $count . '</td>';
        echo '<td>' . $p1->attack($p2) . '</td>';
        echo '<td>' . $p2->attack($p1) . '</td>';
        echo '</tr>';
        echo '</table>';
        echo '</div>';
        $count++;
        $p1->whoAmI();
        $p2->whoAmI();
    }
    echo '<div class="winner">';
    if ($p1->isdead() && $p2->isdead()) {
        echo "It's a draw! Both Pokémon fainted!";
    } elseif ($p1->isdead()) {
        echo 'Le vainqueur est ' . $p2->getNom() . '! ';
        echo '<img src="' . $p2->getUrl() . '" alt="' . $p2->getNom() . '">';
    } else {
        echo 'Le vainqueur est ' . $p1->getNom() . '! ';
        echo '<img src="' . $p1->getUrl() . '" alt="' . $p1->getNom() . '">';
    }
    echo '</div>';
}
   // Combats
   echo "<h1>Combat Feu vs Eau</h1>";
   combat($Dracaufeu, $Carapuce);

   echo "<h1>Combat Eau vs Plante</h1>";
   combat($Carapuce, $Bulbizarre);

   echo "<h1>Combat Feu vs Plante</h1>";
   combat($Dracaufeu, $Bulbizarre);
?>

</body>
</html>