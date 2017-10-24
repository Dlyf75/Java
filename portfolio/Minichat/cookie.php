<?php

if (empty($_POST['pseudo']) && (!isset($_COOKIE['pseudo']) || $_COOKIE['pseudo'] == 'Dlyf75')) {
  setcookie('pseudo', 'Dlyf75', time() + 3600, null, null, false, true);
  $pseudo = "Dlyf75";
}
else {
  if (isset($_POST['pseudo'])) {
    setcookie('pseudo', $_POST['pseudo'], time() + 3600, null, null, false, true);
    $pseudo = $_POST['pseudo'];
  }
  else {
    $pseudo = $_COOKIE['pseudo'];
  }
}

?>
