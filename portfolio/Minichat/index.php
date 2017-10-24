<?php
include ("cookie.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Mini chat</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <h1>Mon Mini chat</h1>
<?php

// Insertion d'un formulaire

include ("formulaire.php");

?>
<?php

// Insertion d'une connexion Ã  la base de donnÃ©e

include ("connexion.php");
 ?>
<?php

// Récupération des messages

$req = $bdd->query('SELECT id, pseudo, message, DATE_FORMAT(date_creation, \'%d/%m/%Y Ã  %H:%i:%s\') AS date_creation FROM minichat ORDER BY date_creation DESC LIMIT 10');

// Affichage de chaque message

while ($donnees = $req->fetch()) {
  echo '<p>' . '[' . $donnees['date_creation'] . ']' . '<strong>' . ' ' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
}

$req->closeCursor();
?>

</body>
</html>
