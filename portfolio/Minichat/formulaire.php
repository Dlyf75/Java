<?php
include ("cookie.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
<!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
  <title>Formulaire</title>
</head>
<body>
  <form method="POST" action="minichat_post.php" class="form_align">
    <p>
      <label for="pseudo">Pseudo</label> :
      <input type="text" name="pseudo" class="inputbasic" <?php

if (isset($_GET['pseudo'])) {
  echo ' value="' . '"';
} ?>><br />
      <label for="message">Message</label> :
      <input type="text" name="message" class="inputbasic" v> <br />
      <input type="submit" value="Envoyer" />

    </p>
  </form>

</body>
</html>
