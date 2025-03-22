<?php
// Configuration de la base de données
$db_config = [
    "server" => "localhost",
    "user" => "root",
    "pass" => "",
    "name" => "test"
];

// Fonction de connexion à la base de données
function connectDB($config) {
    $connexion = mysqli_connect($config["server"], $config["user"], $config["pass"], $config["name"]);
    if (!$connexion) {
        die("Échec de la connexion : " . mysqli_connect_error());
    }
    return $connexion;
}

// Fonction pour récupérer les athlètes par distance
function getAthletesByDistance($connexion, $distance) {
    // Requête unifiée pour tous les types de courses
    // Modification pour exclure les temps nuls avec la condition IS NOT NULL et > 0
    $sql = "SELECT a.id, a.name, a.firstname, a.nationality, 
            COALESCE((SELECT c.temps FROM course_athelete c WHERE c.athelete_id = a.id LIMIT 1), a.temps) AS temps 
            FROM athelete a 
            WHERE a.distance = ? 
            HAVING temps IS NOT NULL AND temps > 0";
    
    // Utilisation de requêtes préparées pour la sécurité
    $stmt = $connexion->prepare($sql);
    $stmt->bind_param("i", $distance);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if (!$result) {
        die("Erreur dans la requête : " . $connexion->error);
    }
    
    $resultats = $result->fetch_all(MYSQLI_ASSOC);
    
    // Tri des résultats par temps (du plus rapide au plus lent)
    usort($resultats, fn($a, $b) => $a['temps'] <=> $b['temps']);
    
    return $resultats;
}

// Fonction pour afficher le tableau des résultats
function afficherTableau($resultats, $distance) {
    if (count($resultats) == 0) {
        echo "<h2>Aucun résultat disponible pour les athlètes " . $distance . "m</h2>";
        return;
    }
    
    echo "<h2>Classement pour les athlètes " . $distance . "m</h2>";
    echo "<table border='1'>
    <tr>
        <th>Position</th>
        <th>ID Athlète</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Nationalité</th>
        <th>Temps (secondes)</th>
    </tr>";

    foreach ($resultats as $index => $resultat) {
        echo "<tr>";
        echo "<td>" . ($index + 1) . "</td>";
        echo "<td>" . htmlspecialchars($resultat['id']) . "</td>";
        echo "<td>" . htmlspecialchars($resultat['name']) . "</td>";
        echo "<td>" . htmlspecialchars($resultat['firstname']) . "</td>";
        echo "<td>" . htmlspecialchars($resultat['nationality']) . "</td>";
        echo "<td>" . htmlspecialchars($resultat['temps']) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
}

// Exécution principale
$connexion = connectDB($db_config);

// Distances à afficher
$distances = [100, 400, 1000];

// Entête HTML
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classements des Athlètes</title>
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes hoverEffect {
            0% {
                transform: scale(1);
            }
            100% {
                transform: scale(1.05);
            }
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 20px;
        }

        h2 {
            color: #333;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background: #007BFF;
            color: white;
            font-weight: bold;
        }

        tr {
            opacity: 0;
            animation: fadeInUp 1s ease-out forwards;
        }

        tr:nth-child(odd) {
            animation-delay: 0.4s;
        }

        tr:nth-child(even) {
            animation-delay: 0.6s;
            background: #f9f9f9;
        }

        tr:hover {
            animation: hoverEffect 0.3s ease-in-out forwards;
            background: #e0e0e0;
        }

        td:first-child {
            font-weight: bold;
            color: #007BFF;
        }
    </style>
</head>
<body>
<?php
// Affichage des tableaux pour chaque distance
foreach ($distances as $distance) {
    $resultats = getAthletesByDistance($connexion, $distance);
    afficherTableau($resultats, $distance);
}

// Fermeture de la connexion (une seule fois à la fin)
mysqli_close($connexion);
?>
</body>
</html>