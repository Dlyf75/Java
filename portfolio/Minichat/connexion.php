<?php
$dsn = 'mysql:host=mysql609.sql001;dbname=domlungycadlyf75;charset=utf8';
$user = 'domlungycadlyf75';
$password = '97490Domi';
try {
  $bdd = new PDO($dsn, $user, $password);
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $e) {
  die('Erreur : ' . $e->getMessage());
}

?>
