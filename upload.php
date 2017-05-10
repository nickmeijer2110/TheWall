<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>The Wall: Welkom</title>
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

    include 'config.php';


    if(isset($_POST['login'])) {
      $username = mysqli_real_escape_string($dbc, htmlentities($_POST['username']));
      $password = mysqli_real_escape_string($dbc, htmlentities($_POST['password']));
      $password = hash('sha512', $password);

      if($username && $password) {
      $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
      $result = mysqli_query($dbc, $query) or die("Fout");
      while($row = mysqli_fetch_array($result)) {
      $_SESSION['username'] = $row['username'];
    }


      if(mysqli_num_rows($result) == 0) {
      header('Location: login.php?login=fout');
                                        }

          if(mysqli_num_rows($result) > 0) {

            $username = $_SESSION['username'];

          header('Location: upload.php');
                                          }

                                  }
                              }


                              if(!isset($_SESSION['username'])) {
                              header('location: login.php?login=fout');
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
                </li><li class="menu__item">
                    <a href="account.php" class="menu__link"><strong><i class="fa fa-angle-right"></i> Mijn account (<?php echo $_SESSION['username']; ?>)</strong></a>
                </li>

                <li class="menu__item">
                    <a href="loguit.php" class="menu__link"><strong><i class="fa fa-angle-right"></i> Uitloggen</strong></a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<?php

        if(isset($_POST['submit'])) {

            $dbc = mysqli_connect(HOST, USER, WACHTWOORD, DB) or die("Foutmelding: Kon niet verbinden met de database!");

            $username = $_SESSION['username'];
            $description = mysqli_real_escape_string($dbc,trim($_POST['description']));
            $target = 'uploads/' . time() . $_FILES['image']['name'];
            $temp = $_FILES['image']['tmp_name'];
            if (!empty($description)) {
                if(move_uploaded_file($temp,$target)) {

                  $query =  "INSERT INTO posts VALUES(0, '$target', '$username', NOW(), '$description')";
                  $result = mysqli_query($dbc, $query) or die('Fout: Query niet gelukt!');

                  $query2 = "SELECT id FROM posts ORDER BY id DESC LIMIT 1";
                  $laatste = mysqli_query($dbc, $query2) or die('Query mislukt!');

                    while ($row = $laatste->fetch_assoc()) {
                         $laatste_id = $row['id'];


                        header('Location: index.php#image'. $laatste_id);
                    }


                    header('Location: index.php#image'. $laatste_id);

                } else {
                    echo "Het bestand is te groot!Probeer het opnieuw.";

                }
            }

        }


 ?>
<div class="container">

  <div class="container-titel"><i class="fa fa-upload"></i> Upload een moment</div>

    <div class="thumbnail-image">
      <center><img id="thumbnail" class="moment-preview-img" src="assets/media/img/preview-cloud.png"/></center>
    </div>

<center>

  <form enctype="multipart/form-data" method="post" action="#">
  <label class="uploadKnop">
  <input class="showmyimage" name="image" type="file" accept="image/*"  onchange="showMyImage(this)" required/>

    <span><i class="fa fa-spin fa-spinner"></i> Bestand selecteren</span>
</label>
</center>

<center>
  <textarea name="description" id="beschrijving" placeholder="Beschrijving.." maxlength="150" required></textarea>
  <div id="count"></div>
</center>

<center><input class="upload-knop" name="submit" type="submit" value="&#xf093; Uploaden"></center>

</div>
</form>


  </div>

  <script src="assets/js/typed.js"></script>
  <script src="assets/js/core.js"></script>
  <script src="https://use.fontawesome.com/cd2f718b2d.js"></script>

  </body>
</html>
