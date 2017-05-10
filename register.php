<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>The Wall: Log in</title>
    <link rel="icon" type="image/png" href="assets/media/img/firewall.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Nick Meijer, Soufiane" />
    <link type="text/css" rel="stylesheet" href="assets/style/core.css" />
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="assets/js/pace.min.js"></script>

  </head>
  <body style="background-image: url(assets/media/img/bg.jpg);" class="animated fadeIn">

    <?php

    session_start();

    if(isset($_SESSION['username'])) {
        header('Location: index.php');
    }


    include 'config.php';

        if($_GET['fout'] == "gebruikersnaam") {
            echo '<script>alert("Deze gebruikersnaam is al in gebruik."); </script>';
        }

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
                </li><li class="menu__item">
                    <a href="upload.php" class="menu__link">Uploaden</a>
                <li class="menu__item">
                    <a href="login.php" class="menu__link"><strong><i class="fa fa-angle-right"></i> Log in</strong></a>
                </li>
                </li><li class="menu__item">
                    <a href="account.php" class="menu__link"><strong><i class="fa fa-angle-right"></i> REGISTREREN</strong></a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<div class="container">

  <div class="container-titel"><i class="fa fa-user-o"></i> Account aanmaken</div>
<center>

  <form style="margin-top: 40px" method="post" action="reg_proces.php">
    <input type="text" autocomplete="off" placeholder="Gebruikersnaam.." name="username" class="login-input" required/>
    <input type="email" autocomplete="off" placeholder="E-mail adres.." name="email" class="login-input" required/>
    <input type="password" autocomplete="off" placeholder="Wachtwoord.." class="login-input" required/><br>
    <input type="password" autocomplete="off" placeholder="Wachtwoord herhalen.." name="password" class="login-input" required/><br>
    <input style="margin-top: 0px; width: 314px" type="submit" value="registreren" name="submit" class="upload-knop">
  </form>



  </div>

  <script src="assets/js/typed.js"></script>
  <script src="assets/js/core.js"></script>
  <script src="https://use.fontawesome.com/cd2f718b2d.js"></script>

  </body>
</html>
