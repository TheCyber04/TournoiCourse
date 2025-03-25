<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$connexion = new mysqli($servername, $username, $password, $dbname);

if ($connexion->connect_error) {
    die("Échec de la connexion : " . $connexion->connect_error);
}

// Vérifier si un ID de course est fourni
if (!isset($_GET['course_id']) || empty($_GET['course_id'])) {
    die("Aucune course sélectionnée.");
}

$course_id = intval($_GET['course_id']); // Sécuriser l'entrée

// Récupérer les informations de la course
$sql = "SELECT * FROM course WHERE id = $course_id";
$result = $connexion->query($sql);

if ($result->num_rows > 0) {
    $course = $result->fetch_assoc();
} else {
    die("Course introuvable.");
}

$connexion->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la Course</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header>
        <h1>Détails de la Course</h1>
    </header>

    <div class="container">
        <h2><strong>Nom :</strong> <?php echo htmlspecialchars($course['id']); ?></h2>
        <p><strong>Distance :</strong> <?php echo htmlspecialchars($course['type']); ?> </p>
        <p><strong>Date :</strong> <?php echo htmlspecialchars($course['date']); ?></p>
        <p><strong>Lieu :</strong> <?php echo htmlspecialchars($course['lieu']); ?></p>

        <a href="orgatest.php" class="button">Retour</a>
    </div>

</body>
</html>
