<?php
session_start();

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>The Wall: <?php echo $_SESSION['username']; ?></title>
    <link rel="icon" type="image/png" href="assets/media/img/firewall.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Nick Meijer, Soufiane" />
    <link type="text/css" rel="stylesheet" href="assets/style/core.css" />
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="assets/js/pace.min.js"></script>

  </head>
  <body style="background-image: url(assets/media/img/bg.jpg);" class="animated fadeIn">
<style>
    .verwijder-knop {
        color: #fff;
        text-align: center;
        width: 246px;
        height: 55px;
        line-height: 50px;
        text-transform: uppercase;
        margin-top: -30px;
        font-weight: 700;
        font-size: 16px;
        cursor: pointer;
        font-family: fontAwesome, Ubuntu, sans-serif;
        border: 2px solid #FA3131;
        background: #FA3131;
        outline: none;
        transition: all 300ms;
    }

    .verwijder-knop:hover {
        background: #E42424;
        border: 2px solid #E42424;
    }
</style>
    <?php

    include 'config.php';


     ?>

    <a href="#" id="back-to-top" title="Terug naar boven"><i class="fa fa-angle-up"></i></a>


    <div id="header" class="l-header">
    <div class="wrap">
        <header class="logo">
            <h1 class="logo__title">
                <a href="#" class="logo__link">
                   <img style="vertical-align: -8px; margin-right: 10px;" height="40px" src="assets/media/img/firewall.svg" /> The Wall
                </a>
            </h1>
        </header>
        <div class="button btn menu-btn">Menu</div>
        <nav class="menu">
            <ul class="menu__list">
                <li class="menu__item">
                    <a href="index.php" class="menu__link">Home</a>
                </li>

                <li class="menu__item">
                    <a href="upload.php" class="menu__link">Uploaden</a>
                </li>

                <?php
                    session_start();

                if(isset($_SESSION['username'])) {
                  echo'<li class="menu__item">
                      <a href="account.php" class="menu__link">Mijn account ('. $_SESSION['username'] .')</a>
                  </li>';
                } else {
                  echo'<li class="menu__item">
                      <a href="login.php" class="menu__link">Log in</a>
                  </li>

                  <li class="menu__item">
                      <a href="register.php" class="menu__link"><strong><i class="fa fa-angle-right"></i> Registreren</strong></a>
                  </li>';
                }

                ?>

                <li class="menu__item">
                    <a href="loguit.php" class="menu__link"><strong><i class="fa fa-angle-right"></i> UITLOGGEN</strong></a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<div class="container">

  <div class="container-titel"><i class="fa fa-user-o"></i> <?php echo $_SESSION['username']; ?></div>
<center>

  <form method="post" action="">
        <input type="password" placeholder="Nieuw wachtwoord.." autocomplete="off" name="password" class="login-input" required/><br>
        <input style="margin-top: 0px; width: 314px" type="submit" value="Wachtwoord wijzigen" name="wijzigen" class="upload-knop">
    </form>

    <?php
    $wachtwoord = $_POST['password'];

    $username = $_SESSION['username'];
    $password = hash('sha512', $wachtwoord);

    if(isset($_POST['wijzigen'])) {
        $query = "UPDATE users SET password = '$password' WHERE username = '$username'";
        $result = mysqli_query($dbc, $query) or die('Foutmelding: Kon wachtwoord niet updaten..');
        header('Location: loguit.php');
    }

    ?>
    <button id="verwijder" class="verwijder-knop" style="margin-top: 25px;width: 313px;"><i class="fa fa-trash-o"></i> Account verwijderen</button>
    <form method="post" action="#">
        <input id="bevestig" style="margin-top: 25px; width: 314px" type="submit" value="&#xf014; Bevestigen.. (Klik)" name="verwijder" class="verwijder-knop">
    </form>

  <?php

  if(isset($_POST['verwijder'])) {
      $query = "DELETE FROM users WHERE username = '$username'";
      $result = mysqli_query($dbc, $query) or die('Foutmelding: Kon account niet verwijderen..');

      $delete = "DELETE FROM posts WHERE post_by = '$username'";
      $result = mysqli_query($dbc, $delete) or die('Foutmelding: Kon posts van gebruiker niet verwijderen..');
      header('Location: loguit.php');
  }
   ?>


  </div>

  <script src="assets/js/typed.js"></script>
  <script src="assets/js/core.js"></script>
  <script src="https://use.fontawesome.com/cd2f718b2d.js"></script>

  </body>
</html>
