<!-- Empêcher d'actualiser le formulaire -->
<?php
session_start();

if(!empty($_POST) OR !empty($_FILES))
{
    $_SESSION['sauvegarde'] = $_POST;
    $_SESSION['savegardeFILES'] = $_FILES;

    $fichierActuel = $_SERVER['PHP_SELF'];
    if(!empty($_SERVER['QUERY_STRING']))
    {
        $fichierActuel .= '?' . $_SERVER['QUERY_STRING'] ;
    }

header('Location: index.php');
exit;
}

if(isset($_SESSION['sauvegarde']))
{
    $_POST = $_SESSION['sauvegarde'] ;
    $_FILES = $_SESSION['savegardeFILES'] ;

    unset($_SESSION['sauvegarde'], $_SESSION['savegardeFILES']);
}


?>
<!-- Vérifier le formulaire -->
<?php

if (isset($_POST['submit'])) {
    $error = "";

    if (empty($_POST['name'])) {
        $error="<br />- S'il vous plaît, entrer votre nom";
    }
    if (empty($_POST['email'])) {
        $error.="<br />- S'il vous plaît, entrer votre adresse email";
    }
    if (empty($_POST['message'])) {
        $error.="<br />- S'il vous plaît, entrer votre message";
    }
    if (empty($_POST['check'])) {
        $error.="<br /> - Confirmer que vous êtes un humain";
    }

    if (!(empty($error))) {
        $result='<div class="alert alert-danger" role="alert"><strong>Whoops, une ou plusieurs erreurs trouvées:</strong> '.$error.'</div>';

    } else {
        mail("domilung@gmail.com", "Contact message", "
        Name: ".$_POST['name']."
        Email: ".$_POST['email']."
        Message: ".$_POST['message']);

        {
        $result='<div class="alert alert-success" role="alert">Merci, votre message a été bien validé et envoyé'.'</div>';

        }
    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width" />
  <meta name="description" content="Ceci est ma page de contact" />
  <meta name="keywords" content="HTML, CSS, JS, PHP, SQL" />
  <meta name="author" content="Dominique LUNG YUT FONG" />
  <!-- Perso CSS -->
  <link rel="stylesheet" type="text/css" href="css/normalize.css" />
  <!-- Appel du CSS de font-awesome pour les icônes -->
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <title>Contact</title>
  <!-- Boostrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="../Contact/css/style.css">
  <!-- Appel du JS -->
  <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <!-- HEADER : l'entête de mon site + la navigation -->
    <header>
      <a href="../index.html"> Mon portfolio</a>
      <nav class="container">
        <a href="../index.html"><i class="fa fa-home"></i> Accueil</a>
        <a href="../Presentation/index.html"><i class="fa fa-briefcase"></i> Présentation</a>
        <a href="../Realisation/index.html"><i class="fa fa-folder-open"></i> Réalisation</a>
        <a href="../Contact/index.php"><i class="fa fa-envelope"></i> Contact</a>
      </nav>
    </header>
  <!-- Main -->
  <main class="container clear">
    <!-- Section -->
    <section id="contact">
      <div class="container">

          <div class="row">
              <div class="col-md-6 col-md-offset-3">
                  <h1>Formulaire de contact</h1>

                  <?php if (isset($_POST['submit'])) { echo $result; } ?>


                  <p>Contactez-moi!</p>
                  <!-- Formulaire -->
                  <form method="POST">
                      <div class="form-group">
                          <input type="text" name="name" class="form-control" placeholder="Votre nom" value="<?php if (empty($_POST['name'])) {$error; } ?>" />
                      </div>
                      <div class="form-group">
                          <input type="email" name="email" class="form-control" placeholder="Votre adresse email" value="<?php if (empty($_POST['email'])) {$error; } ?>" />
                      </div>
                      <div class="form-group">
                          <textarea name="message" rows="5" class="form-control" placeholder="Message..." value="<?php echo $_POST['message']; ?>"></textarea>
                      </div>
                      <div class="checkbox">
                              <input type="checkbox" name="check" id="check"> <label for="check"> Je suis un humain</label>
                      </div>
                      <div class="submit">
                      <input type="submit" name="submit" class="btn btn-secondary" value="Envoyer"/>
                      </div>
                  </form>
              </div>
          </div>
      </div>
    </section>
  </main>
  <footer>
    <p>
      Portfolio - 2017 : Dominique <span>lung yut fong</span>
    </p>
  </footer>
</body>
</html>
