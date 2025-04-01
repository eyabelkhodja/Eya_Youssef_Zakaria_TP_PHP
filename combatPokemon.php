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

   $attaque_Dracaufeu = new AttackPokemon(10, 100, 2, 20);
   $Dracaufeu = new Pokemon("Dracaufeu Gigamax", 200, "https://www.pokepedia.fr/images/thumb/8/8b/Dracaufeu_%28Gigamax%29-EB.png/500px-Dracaufeu_%28Gigamax%29-EB.png", $attaque_Dracaufeu);
   $attaque_Pikachu = new AttackPokemon(30, 80, 4, 20);
   $Pikachu = new Pokemon("Pikachu", 200, "https://archives.bulbagarden.net/media/upload/thumb/8/8c/0025Pikachu-Gigantamax.png/100px-0025Pikachu-Gigantamax.png", $attaque_Pikachu);

   $Pikachu->whoAmI();
   $Dracaufeu->whoAmI();

   $count = 1;
   
   
   while (!$Pikachu->isdead() && !$Dracaufeu->isdead()) {
    echo '<div class="battle-log-container">';
   echo '<table class="battle-table">';
   echo '<tr><th>Round</th><th>Pikachu Attacks</th><th>Dracaufeu Attacks</th></tr>';
       echo '<tr>';
       echo '<td>' . $count . '</td>';
       echo '<td>' . $Pikachu->attack($Dracaufeu) . '</td>';
       echo '<td>' . $Dracaufeu->attack($Pikachu) . '</td>';
       echo '</tr>';
       echo '</table>';
       echo '</div>';

       $count++;
       $Pikachu->whoAmI();
       $Dracaufeu->whoAmI();
   }
   echo '<div class="winner">';
   if ($Pikachu->isdead() && $Dracaufeu->isdead()) {
       echo "It's a draw! Both Pokémon fainted!";
   } elseif ($Pikachu->isdead()) {
       echo 'Le vainqueur est Dracaufeu Gigamax! ';
       echo '<img src="'.$Dracaufeu->getUrl().'" alt="Dracaufeu Gigamax">';
   } else {
       echo 'Le vainqueur est Pikachu! ';
       echo '<img src="'.$Pikachu->getUrl().'" alt="Pikachu">';
   }
   echo '</div>';

?>
</body>
</html>