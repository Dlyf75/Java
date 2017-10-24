<?php
include ("cookie.php");

// Insertion d'une connexion Ã  la base de donnÃ©e

include ("connexion.php");

// Insertion du message Ã  l'aide d'une requÃªte prÃ©parÃ©e

$req = $bdd->prepare('INSERT INTO minichat(pseudo, message, date_creation) VALUES (?, ?, NOW())');
$req->execute(array(
  $_POST['pseudo'],
  $_POST['message']
));

// Redirection du visiteur vers la page du minichat

header('Location: index.php?pseudo=' . $_POST['pseudo']);
?>
