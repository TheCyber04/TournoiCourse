
<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";  

$connexion = new mysqli($servername, $username, $password, $dbname);

if ($connexion->connect_error) {
    die("Erreur de connexion : " . $connexion->connect_error);
}

// Vérifier si l'ID de la course est défini
$course_id = isset($_GET['course_id']) ? intval($_GET['course_id']) : 0;

if ($course_id > 0) {
    // Récupérer les infos de la course
    $sql_course_info = "SELECT * FROM course WHERE id = $course_id";
    $result_course_info = $connexion->query($sql_course_info);
    $course_info = $result_course_info->fetch_assoc();

    // Récupérer le classement des athlètes
    $sql_ranking = "
        SELECT ca.temps, a.name, a.firstname, a.nationality, a.distance, a.date_de_naissance 
        FROM course_athelete ca
        JOIN athelete a ON ca.athelete_id = a.id
        WHERE ca.course_id = $course_id
        ORDER BY ca.temps ASC";
    $result_ranking = $connexion->query($sql_ranking);
} else {
    $course_info = null;
    $result_ranking = null;
}

// Fermer la connexion
$connexion->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classement de la Course</title>
    <link rel="stylesheet" href="styles1.css">
</head>
<body>
    <header>
    <header>
    <h1>Classement de la Course <?= htmlspecialchars($course_id) ?></h1>
</header>

    </header>

    <div class="ranking-container">
        <?php if ($result_ranking && $result_ranking->num_rows > 0): ?>
            <?php $position = 1; ?>
            <?php while ($row = $result_ranking->fetch_assoc()): ?>
                <div class="athlete-card" onmouseover="showDetails(this)" onmouseout="hideDetails(this)">
                    <div class="card-front">
                        <span class="position">#<?= $position++; ?></span>
                        <span class="name"><?= $row['firstname'] . " " . $row['name']; ?></span>
                        <span class="time"><?= $row['temps']; ?>s</span>
                    </div>
                    <div class="card-back">
                        <p><strong>Nom:</strong> <?= $row['firstname'] . " " . $row['name']; ?></p>
                        <p><strong>Nationalité:</strong> <?= $row['nationality']; ?></p>
                        <p><strong>Distance:</strong> <?= $row['distance']; ?> km</p>
                        <p><strong>Date de naissance:</strong> <?= $row['date_de_naissance']; ?></p>
                        <p><strong>Temps:</strong> <?= $row['temps']; ?>s</p>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>Aucun classement disponible pour cette course.</p>
        <?php endif; ?>
    </div>

    <div class="course-info">
        <h2>Détails de la Course</h2>
        <?php if ($course_info): ?>
            <div class="info-card">
                <p><strong>Date:</strong> <?= $course_info['date']; ?></p>
                <p><strong>Lieu:</strong> <?= $course_info['lieu']; ?></p>
                <p><strong>Type:</strong> <?= $course_info['type']; ?></p>
                <p><strong>Arbitre:</strong> <?= $course_info['arbitre']; ?></p>
            </div>
        <?php else: ?>
            <p>Aucune information disponible sur cette course.</p>
        <?php endif; ?>
    </div>

    <script>
    function showDetails(card) {
        card.classList.add('active');
    }

    function hideDetails(card) {
        card.classList.remove('active');
    }
    </script>

</body>
</html>


