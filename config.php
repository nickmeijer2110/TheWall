<?php

// Config: The Wall.

error_reporting(0);

define('HOST', 'localhost');
define('USER', '23506_wallroot'); // gebruikersnaam
define('WACHTWOORD', '23506_wall'); // wachtwoord
define('DB', '23506_wall'); // database

$dbc = mysqli_connect(HOST, USER, WACHTWOORD, DB) or die("Foutmelding: Kon niet verbinden met de database!");

?>
