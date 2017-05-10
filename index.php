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
  <body class="animated fadeIn">


    <div class="headervideo">
      <video poster="assets/media/img/bg.jpg" id="bgvid" playsinline autoplay muted loop>
        <source src="assets/media/video/bgg.mp4" type="video/mp4">
      </video>
    </div>

    <a href="#" id="back-to-top" title="Terug naar boven"><i class="fa fa-angle-up"></i></a>

    <div class="headervideo-mobiel">

    </div>


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
                    <a id="bibliotheek" style="padding-right: 20px;padding-left: 41px;" href="#" class="menu__link">



                      <div class="ring-container">
                          <div class="ringring"></div>
                          <div class="circle"></div>
                      </div>Bibliotheek</a>

                </li><li class="menu__item">
                    <a href="upload.php" class="menu__link">Uploaden</a>
                </li>

                <?php

                session_start();

                if(isset($_SESSION['username'])) {
                  echo'<li class="menu__item">
                      <a href="account.php" class="menu__link">Mijn account ('. $_SESSION['username'] .')</a>
                  </li>
                    <li class="menu__item">
                      <a href="loguit.php" class="menu__link"><i class="fa fa-angle-right"></i> Uitloggen</a>
                  </li>
                  ';
                } else {
                  echo'<li class="menu__item">
                      <a href="login.php" class="menu__link">Log in</a>
                  </li>

                  <li class="menu__item">
                      <a href="register.php" class="menu__link"><strong><i class="fa fa-angle-right"></i> Registreren</strong></a>
                  </li>';
                }

                ?>


            </ul>
        </nav>
    </div>
</div>

  <div class="wrapperr">
    <div class="slogan"></div>

  </div>

  <div class="promo-bar">
    <div class="wrapper">
      <div class="promo-item">
        <div id="icon1" class="icon">
          <i class="fa fa-bolt"></i>
        </div>

        <span>SNEL EN MAKKELIJK</span>
        <div class="tekst">
          Ervaring delen? Super snel geupload!
        </div>

      </div>
      <div class="promo-item">
        <div class="icon">
          <i class="fa fa-bars"></i>
        </div>

        <span>ONLINE BIBLIOTHEEK</span>
        <div class="tekst">
          Jouw snapshots, altijd en overal bereikbaar!
        </div>
      </div>
      <div class="promo-item">
        <div class="icon">
          <i class="fa fa-users"></i>
        </div>

        <span>Delen met vrienden</span>
        <div class="tekst">
          Deel jou momenten met al je vrienden!
        </div>
      </div>
      <div class="promo-item item-last">
        <div class="icon">
          <i class="fa fa-smile-o"></i>
        </div>

        <span>Helemaal gratis</span>
        <div class="tekst">
          Geen extra kosten of limieten verbonden!
        </div>
      </div>
    </div>
  </div>

  <div class="content">
    <div class="categorie-titel-content">
      <div class="wrapper">
        <div class="zoekveld-content">
          <span class="op-zoek-tekst">populaire games</span>
          <form id="content" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

              <input name="searchterm" autocomplete="off" spellcheck="false" type="text" name="input" class="input input-zoek" required/>
              <button type="reset" class="search"></button>
            </form>
        </div>
      </div>

      </div>

      <div class="game-categorieen">
        <div class="wrapper">
          <div class="categorieen">

            <a href="?game=gta"><div class="categorie gta5">

            </div></a>

                  <a href="?game=csgo"><div class="categorie csgo">

            </div></a>

              <a href="?"><div class="categorie mc">

                  </div></a>

          </div>
        </div>
      </div>



<div style="background: #161616; position: relative; z-index: 2; min-height: 800px">
 <div class="tegels">
           <?php
              include 'config.php';

              if(isset($_POST['searchterm'])) {
                  $searchterm = mysqli_real_escape_string($dbc, trim($_POST['searchterm']));
                  $searchterm = '%' . $searchterm . '%';
              } else {
                  $searchterm = '%';
              }

              $gta = "GTA";
              $gta_zoek = '%' . $gta . '%';

              $csgo = "CSGO";
              $csgo_zoek = '%' . $csgo . '%';

              $mc = "Minecraft";
              $mc_zoek = '%' . $mc . '%';


           if($_GET['game'] == "gta") {
               $query = "SELECT * FROM posts WHERE beschrijving LIKE '$gta_zoek' ORDER BY id DESC";
               $result = mysqli_query($dbc, $query) or die('Foutmelding: Query mislukt.');

               while($row = mysqli_fetch_array($result)) {
                   $id = $row['id'];
                   $img = $row['img'];
                   $post_by = $row['post_by'];
                   $datum = $row['datum'];
                   $beschrijving = $row['beschrijving'];

                   echo '


                  <div class="tegel" data-scale="1.1" data-image="'. $img .'">
                    <div class="beschrijving post">
                      <a href="#" class="plus-permalink"></a>
                         <aside class="permalink">
                           <div>
                             <strong><i class="fa fa-user-o"></i> '. $post_by .'</strong>, '. $datum .',<br /><br />
                             <strong><i class="fa fa-quote-left"></i></strong>
                             '. $beschrijving .'
                             <strong><i class="fa fa-quote-right"></i></strong>
                           </div>
                         </aside>
                    </div>

                     <a href="#image'. $id .'" class="">
                       <div class="weergaven"><div class="tekst"><i class="fa fa-expand" aria-hidden="true"></i> Bekijk volledige afbeelding</div></div>
                     </a>
                  </div>



               <div class="lightbox short-animate" id="image'. $id .'">
                 <img class="long-animate" src="'. $img .'"/>
               </div>
               <div id="lightbox-controls" class="short-animate">
                 <a id="close-lightbox" class="long-animate" href="#!"></a>
               </div>
             ';
               }


           }

           if($_GET['game'] == "csgo") {
               $query = "SELECT * FROM posts WHERE beschrijving LIKE '$csgo_zoek' ORDER BY id DESC";
               $result = mysqli_query($dbc, $query) or die('Foutmelding: Query mislukt.');

               while($row = mysqli_fetch_array($result)) {
                   $id = $row['id'];
                   $img = $row['img'];
                   $post_by = $row['post_by'];
                   $datum = $row['datum'];
                   $beschrijving = $row['beschrijving'];

                   echo '


                  <div class="tegel" data-scale="1.1" data-image="'. $img .'">
                    <div class="beschrijving post">
                      <a href="#" class="plus-permalink"></a>
                         <aside class="permalink">
                           <div>
                             <strong><i class="fa fa-user-o"></i> '. $post_by .'</strong>, '. $datum .',<br /><br />
                             <strong><i class="fa fa-quote-left"></i></strong>
                             '. $beschrijving .'
                             <strong><i class="fa fa-quote-right"></i></strong>
                           </div>
                         </aside>
                    </div>

                     <a href="#image'. $id .'" class="">
                       <div class="weergaven"><div class="tekst"><i class="fa fa-expand" aria-hidden="true"></i> Bekijk volledige afbeelding</div></div>
                     </a>
                  </div>



               <div class="lightbox short-animate" id="image'. $id .'">
                 <img class="long-animate" src="'. $img .'"/>
               </div>
               <div id="lightbox-controls" class="short-animate">
                 <a id="close-lightbox" class="long-animate" href="#!"></a>
               </div>
             ';
               }

           }

           if($_GET['game'] == "mc") {
               $query = "SELECT * FROM posts WHERE beschrijving LIKE '$mc_zoek' ORDER BY id DESC";
               $result = mysqli_query($dbc, $query) or die('Foutmelding: Query mislukt.');

               while($row = mysqli_fetch_array($result)) {
                   $id = $row['id'];
                   $img = $row['img'];
                   $post_by = $row['post_by'];
                   $datum = $row['datum'];
                   $beschrijving = $row['beschrijving'];

                   echo '


                  <div class="tegel" data-scale="1.1" data-image="'. $img .'">
                    <div class="beschrijving post">
                      <a href="#" class="plus-permalink"></a>
                         <aside class="permalink">
                           <div>
                             <strong><i class="fa fa-user-o"></i> '. $post_by .'</strong>, '. $datum .',<br /><br />
                             <strong><i class="fa fa-quote-left"></i></strong>
                             '. $beschrijving .'
                             <strong><i class="fa fa-quote-right"></i></strong>
                           </div>
                         </aside>
                    </div>

                     <a href="#image'. $id .'" class="">
                       <div class="weergaven"><div class="tekst"><i class="fa fa-expand" aria-hidden="true"></i> Bekijk volledige afbeelding</div></div>
                     </a>
                  </div>



               <div class="lightbox short-animate" id="image'. $id .'">
                 <img class="long-animate" src="'. $img .'"/>
               </div>
               <div id="lightbox-controls" class="short-animate">
                 <a id="close-lightbox" class="long-animate" href="#!"></a>
               </div>
             ';
               }

           }


           if (empty($_GET)) {
               $query = "SELECT * FROM posts WHERE beschrijving LIKE '$searchterm' ORDER BY id DESC";
               $result = mysqli_query($dbc, $query) or die('Foutmelding: Query mislukt.');

               while($row = mysqli_fetch_array($result)) {
                   $id = $row['id'];
                   $img = $row['img'];
                   $post_by = $row['post_by'];
                   $datum = $row['datum'];
                   $beschrijving = $row['beschrijving'];

                   echo '


                  <div class="tegel" data-scale="1.1" data-image="'. $img .'">
                    <div class="beschrijving post">
                      <a href="#" class="plus-permalink"></a>
                         <aside class="permalink">
                           <div>
                             <strong><i class="fa fa-user-o"></i> '. $post_by .'</strong>, '. $datum .',<br /><br />
                             <strong><i class="fa fa-quote-left"></i></strong>
                             '. $beschrijving .'
                             <strong><i class="fa fa-quote-right"></i></strong>
                           </div>
                         </aside>
                    </div>

                     <a href="#image'. $id .'" class="">
                       <div class="weergaven"><div class="tekst"><i class="fa fa-expand" aria-hidden="true"></i> Bekijk volledige afbeelding</div></div>
                     </a>
                  </div>



               <div class="lightbox short-animate" id="image'. $id .'">
                 <img class="long-animate" src="'. $img .'"/>
               </div>
               <div id="lightbox-controls" class="short-animate">
                 <a id="close-lightbox" class="long-animate" href="#!"></a>
               </div>
             ';
               }
           }


            ?>

    </div>
  </div>

  <script src="assets/js/typed.js"></script>
  <script src="assets/js/core.js"></script>
  <script src="https://use.fontawesome.com/cd2f718b2d.js"></script>

  </body>
</html>
