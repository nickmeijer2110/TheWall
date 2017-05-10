<?php
 if(!isset($_POST['submit'])) {
    die('Pagina niet gevonden.');
}

    include 'config.php';

    $gebruikersnaam = mysqli_real_escape_string($dbc, htmlentities($_POST['username']));
    $email = mysqli_real_escape_string($dbc, htmlentities($_POST['email']));
    $wachtwoord = mysqli_real_escape_string($dbc, htmlentities($_POST['password']));
    $wachtwoord = hash('sha512', $wachtwoord);

if (isset($_POST['submit'])) {
    $check = mysqli_query($dbc, "SELECT * FROM users WHERE username='$gebruikersnaam'");
    $checkrows = mysqli_num_rows($check);
}

if($checkrows>0) {
    header('Location: register.php?fout=gebruikersnaam');
} else {
    $query = "INSERT INTO users VALUES(0, '$gebruikersnaam', '$email', '$wachtwoord', 1)";
    $result = mysqli_query($dbc, $query) or die('Foutmelding: Query mislukt!');
    header('Location: login.php');
}


 ?>
