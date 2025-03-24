<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    animation: fadeInUp 1s ease-out forwards; /* Durée de 1 seconde pour un effet plus lent */
}

tr:nth-child(odd) {
    animation-delay: 0.4s; /* Décalage de l'animation pour les lignes impaires */
}

tr:nth-child(even) {
    animation-delay: 0.6s; /* Décalage de l'animation pour les lignes paires */
}

tr:hover {
    animation: hoverEffect 0.3s ease-in-out forwards;
    background: #e0e0e0;  /* Couleur de fond au survol */
}

td:first-child {
    font-weight: bold;
    color: #007BFF;
}


    </style>
</head>
<body>
    
</body>
</html>

<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "test";

$connexion = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
if (!$connexion) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

$sql = "SELECT a.id, a.name, a.firstname, a.nationality,
(SELECT c.temps FROM course_athelete c WHERE c.athelete_id = a.id LIMIT 1) AS temps 
FROM athelete a
WHERE a.distance = 100 HAVING temps IS NOT NULL AND temps > 0";

$result = $connexion->query($sql);

if (!$result) {
    die("Erreur dans la requête : " . $connexion->error);
}

$resultats = $result->fetch_all(MYSQLI_ASSOC);

// Trier les résultats par temps (du plus rapide au plus lent)
usort($resultats, fn($a, $b) => $a['temps'] <=> $b['temps']);

function afficherTableau($resultats) {
    echo "<h2>Classement pour les athlètes 100m</h2>";
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

afficherTableau($resultats);

mysqli_close($connexion);
?>
