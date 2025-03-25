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

// Valider les données récupérées
if (!$annee || !$mois || !$jour || !$stade) {
    die("Erreur : tous les champs requis doivent être remplis.");
}

// Création de la date au format attendu
$date_course = "$annee-$mois-$jour";

// Vérification si on modifie une course existante
$course_id = isset($_POST['course_id']) ? $_POST['course_id'] : null;

// Si l'ID n'existe pas, on insère une nouvelle course
if (!$course_id) {
    $stmt = $mysqli->prepare("INSERT INTO course (type, date, lieu) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $distance, $date_course, $stade);
    $stmt->execute();
    $course_id = $stmt->insert_id; // Récupérer l'ID de la nouvelle course
} else {
    // Mise à jour d'une course existante
    $stmt = $mysqli->prepare("UPDATE course SET type = ?, date = ?, lieu = ? WHERE id = ?");
    $stmt->bind_param('sssi', $distance, $date_course, $stade, $course_id);
    $stmt->execute();
}

// Suppression des anciens athlètes associés
$stmt = $mysqli->prepare("DELETE FROM course_athelete WHERE course_id = ?");
$stmt->bind_param('i', $course_id);
$stmt->execute();

// Ajout des nouveaux athlètes sélectionnés
if (isset($selected_athletes) && is_array($selected_athletes)) {
    foreach ($selected_athletes as $athlete_id) {
        $stmt = $mysqli->prepare("INSERT INTO course_athelete (course_id, athelete_id) VALUES (?, ?)");
        $stmt->bind_param('ii', $course_id, $athlete_id);
        $stmt->execute();
    }
} else {
    die("Erreur : Aucun athlète sélectionné.");
}

// Redirection vers confirmation.php
header("Location: confirmation.php?id=$course_id&date=$date_course");
exit();
?>
