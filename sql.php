
<?php
// Informations de connexion
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "test";

// Connexion à la base de données
$connexion = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
if (!$connexion) {
    die("Échec de la connexion : " . mysqli_connect_error());
}
?>