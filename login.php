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
                </li>
                <li class="menu__item">
                    <a href="login.php" class="menu__link"><strong><i class="fa fa-angle-right"></i> Log in</strong></a>
                </li>
                <li class="menu__item">
                    <a href="register.php" class="menu__link"><strong><i class="fa fa-angle-right"></i> REGISTREREN</strong></a>
                </li>
            </ul>
        </nav>
    </div>
</div>

    <style>
        .notificatie-foutmelding {
            width: 600px;
            height: 60px;
            line-height: 60px;
            background: rgba(0, 0, 0, 0.7);
            border-radius: 5px;
            color: #fff;
            text-align: center;
            text-transform: uppercase;
            margin: 0 auto;
            font-size: 20px;
        }
    </style>

<div style="height: 340px; top: calc(50% - 170px);" class="container">
    <?php

   if($_GET['login'] == "fout") {
       echo '
            <div class="notificatie-foutmelding" style="position: absolute;top: -80px;">
        <Strong>Oeps!</Strong> Gebruikersnaam of wachtwoord onjuist!
    </div>
       ';
   }

    ?>

  <div class="container-titel"><i class="fa fa-lock"></i> Log in op the wall</div>
<center>

  <form method="post" action="upload.php">
    <input type="text" autocomplete="off" placeholder="Gebruikersnaam.." name="username" class="login-input" required/>
    <input type="password" autocomplete="off" placeholder="Wachtwoord.." name="password" class="login-input" required/><br>
    <input style="margin-top: 0px; width: 314px" type="submit" value="Inloggen" name="login" class="upload-knop">
  </form>

  <?php

   ?>


  </div>

  <script src="assets/js/typed.js"></script>
  <script src="assets/js/core.js"></script>
  <script src="https://use.fontawesome.com/cd2f718b2d.js"></script>

  </body>
</html>
