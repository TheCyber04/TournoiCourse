<?php
// Paramètres de connexion à la base de données
$host = 'localhost';
$dbname = 'test';
$username = 'root';
$password = '';

// Connexion à MySQL
$mysqli = new mysqli($host, $username, $password, $dbname);

// Vérification de la connexion
if ($mysqli->connect_error) {
    die("Erreur de connexion : " . $mysqli->connect_error);
}

// Récupération des données du formulaire
$annee = isset($_POST['annee']) ? $_POST['annee'] : null;
$mois = isset($_POST['mois']) ? $_POST['mois'] : null;
$jour = isset($_POST['jour']) ? $_POST['jour'] : null;
$stade = isset($_POST['stade']) ? $_POST['stade'] : null;
$distance = isset($_POST['distance']) ? $_POST['distance'] : null;  // Récupération de la distance

// Valider les données récupérées
if (!$annee || !$mois || !$jour || !$stade || !$distance) {
    die("Erreur : tous les champs requis doivent être remplis.");
}

// Création de la date au format attendu
$date_course = "$annee-$mois-$jour";

// Insertion d'une nouvelle course
$stmt = $mysqli->prepare("INSERT INTO course (type, date, lieu) VALUES (?, ?, ?)");
$stmt->bind_param('sss', $distance, $date_course, $stade);
$stmt->execute();

// Récupérer l'ID de la nouvelle course
$course_id = $stmt->insert_id;

// Redirection vers confirmation.php
header("Location: confirmation.php?id=$course_id&date=$date_course");
exit();
?>
