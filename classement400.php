<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
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

tr:nth-child(even) {
    background: #f9f9f9;
}

tr:hover {
    background: #f1f1f1;
    transition: 0.3s ease-in-out;
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

$sql = "SELECT * FROM athelete WHERE distance = 400";
$result = $connexion->query($sql);

if (!$result) {
    die("Erreur dans la requête : " . $connexion->error);
}

$resultats = $result->fetch_all(MYSQLI_ASSOC);

// Trier les résultats par temps (du plus rapide au plus lent)
usort($resultats, fn($a, $b) => $a['temps'] <=> $b['temps']);

function afficherTableau($resultats) {
    echo "<h2>Classement pour les athlètes 400m</h2>";
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
