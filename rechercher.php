<?php
// Connexion à la base de données
$mysqli = new mysqli("localhost", "root", "", "test");

// Vérification de la connexion
if ($mysqli->connect_error) {
    die("Connexion échouée: " . $mysqli->connect_error);
}

// Récupération des paramètres de recherche
$pays = isset($_GET['pays']) ? trim($_GET['pays']) : '';
$course = isset($_GET['course']) ? trim($_GET['course']) : '';
$mot_cle = isset($_GET['mot_cle']) ? trim($_GET['mot_cle']) : '';

// Requête SQL pour les athlètes (recherche par nationalité)
$sql_athletes = "SELECT * FROM athelete WHERE 1=1";
if (!empty($pays)) {
    // Utiliser LOWER et TRIM pour rendre la recherche insensible à la casse et enlever les espaces
    $sql_athletes .= " AND LOWER(TRIM(nationality)) LIKE LOWER('%" . $mysqli->real_escape_string($pays) . "%')";
}
if (!empty($mot_cle)) {
    // Recherche insensible à la casse pour le mot-clé dans le nom et prénom
    $sql_athletes .= " AND (LOWER(name) LIKE LOWER('%" . $mysqli->real_escape_string($mot_cle) . "%') OR LOWER(firstname) LIKE LOWER('%" . $mysqli->real_escape_string($mot_cle) . "%'))";
}

// Requête SQL pour les courses (recherche par pays = lieu)
$sql_courses = "SELECT * FROM course WHERE 1=1";
if (!empty($pays)) {
    // Utiliser LOWER et TRIM pour rendre la recherche insensible à la casse et enlever les espaces
    $sql_courses .= " AND LOWER(TRIM(lieu)) LIKE LOWER('%" . $mysqli->real_escape_string($pays) . "%')";
}
if (!empty($course)) {
    // Recherche insensible à la casse pour le type de course
    $sql_courses .= " AND LOWER(type) LIKE LOWER('%" . $mysqli->real_escape_string($course) . "%')";
}
if (!empty($mot_cle)) {
    // Recherche insensible à la casse pour le mot-clé dans le lieu des courses
    $sql_courses .= " AND LOWER(lieu) LIKE LOWER('%" . $mysqli->real_escape_string($mot_cle) . "%')";
}

// Exécution des requêtes
$result_athletes = $mysqli->query($sql_athletes);
$result_courses = $mysqli->query($sql_courses);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche Athlètes et Courses</title>
    <style>
        /* Style global */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4ff; /* Bleu clair */
            color: #0f0bF3; /* Bleu principal */
            margin: 0;
            padding: 20px;
        }

        /* Conteneur principal avec flexbox pour deux colonnes */
        .container {
            display: flex;
            justify-content: center;
            gap: 20px;
            max-width: 1200px;
            margin: auto;
        }

        /* Style des colonnes */
        .column {
            flex: 1;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 3px 3px 10px rgba(0, 0, 255, 0.2);
        }

        /* Titres des colonnes */
        h3 {
            color: #0f0bF3;
            border-bottom: 2px solid #0f0bF3;
            padding-bottom: 5px;
            text-align: center;
        }

        /* Style des cartes */
        .athlete, .course {
            border: 2px solid #0f0bF3;
            border-radius: 10px;
            padding: 15px;
            margin: 10px 0;
            text-align: center;
            transition: transform 0.3s ease-in-out;
        }

        /* Effet au survol */
        .athlete:hover, .course:hover {
            transform: scale(1.05);
        }

        /* Texte des cartes */
        .athlete p, .course p {
            font-size: 16px;
            margin: 5px 0;
        }

        /* Responsivité */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Colonne Athlètes -->
    <div class="column">
        <h3>Athlètes Trouvés</h3>
        <?php
        if ($result_athletes->num_rows > 0) {
            while ($row = $result_athletes->fetch_assoc()) {
                echo "<div class='athlete'>";
                echo "<p><strong>Name:</strong> " . htmlspecialchars($row['name']) . " " . htmlspecialchars($row['firstname']) . "</p>";
                echo "<p><strong>Country:</strong> " . htmlspecialchars($row['nationality']) . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>Aucun athlète trouvé.</p>";
        }
        ?>
    </div>

    <!-- Colonne Courses -->
    <div class="column">
        <h3>Courses Trouvées</h3>
        <?php
        if ($result_courses->num_rows > 0) {
            while ($row = $result_courses->fetch_assoc()) {
                echo "<div class='course'>";
                echo "<p><strong>Course ID:</strong> " . htmlspecialchars($row['id']) . "</p>";
                echo "<p><strong>Location:</strong> " . htmlspecialchars($row['lieu']) . "</p>";
                echo "<p><strong>Date:</strong> " . htmlspecialchars($row['date']) . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>Aucune course trouvée.</p>";
        }
        ?>
    </div>
</div>

</body>
</html>
