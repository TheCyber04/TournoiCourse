<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COURSE1</title>
    <style>
        /* Style général de la page */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 0;
}

/* Titre */
h2 {
    text-align: center;
    color: #333;
    margin-top: 30px;
}

/* Style de la table */
table {
    width: 80%;
    margin: 30px auto;
    border-collapse: collapse;
    background-color: #ffffff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

/* Style des cellules de la table */
th, td {
    padding: 12px;
    text-align: center;
    border: 1px solid #ddd;
}

/* Style des en-têtes */
th {
    background-color: #4CAF50;
    color: white;
}

/* Style des lignes impaires */
tr:nth-child(odd) {
    background-color: #f2f2f2;
}

/* Style au survol des lignes */
tr:hover {
    background-color: #ddd;
}

/* Style des cases contenant des erreurs */
.error {
    color: red;
    font-weight: bold;
}

    </style>
</head>
<body>
    
</body>
</html>
<?php
include("sql.php");
// Fonction pour générer un temps aléatoire entre 9 et 15 secondes avec 2 décimales
function genererTempsAleatoire() {
    return round(rand(749, 1200) / 100, 2);
}

// Récupérer les athlètes de la base de données
$sql = "SELECT athelete_id FROM course_athelete WHERE course_id = 1";
$result = $connexion->query($sql);

// Vérifier si la requête a fonctionné
if (!$result) {
    die(" Erreur de requête : " . $connexion->error);
}

// Tableau pour stocker les résultats
$resultats = [];

while ($row = $result->fetch_assoc()) {
    $athlete_id = $row['athelete_id'];
    $temps = genererTempsAleatoire();
    
    // Mettre à jour la base de données avec le temps généré
    $update_sql = "UPDATE course_athelete SET temps = $temps WHERE athelete_id = $athlete_id";
    if ($connexion->query($update_sql)) {
        // Stocker les résultats pour l'affichage
        $resultats[] = ['id' => $athlete_id, 'temps' => $temps];
    } else {
        echo " Erreur de mise à jour pour l'athlète ID $athlete_id : " . $connexion->error . "<br>";
    }
}

// Trier les résultats par temps (du plus rapide au plus lent)
usort($resultats, fn($a, $b) => $a['temps'] <=> $b['temps']);

// Mettre à jour le statut des athlètes
foreach ($resultats as $index => $resultat) {
    $statut = ($index < 5) ? "qualifié" : "éliminé";
    $id = $resultat['id'];
    
    // Modification ici : UPDATE athelete au lieu de course_athelete
    $update_statut_sql = "UPDATE athelete SET status = '$statut' WHERE id = $id";
    
    if (!$connexion->query($update_statut_sql)) {
        echo " Erreur de mise à jour du statut pour l'athlète ID $id : " . $connexion->error . "<br>";
    }
}

// Afficher les résultats et le classement
echo "<h2>Temps générés pour les athlètes</h2>";
echo "<table border='1'>
    <tr>
        <th>Position</th>
        <th>ID Athlète</th>
        <th>Temps (secondes)</th>
        <th>Status</th>
    </tr>";

foreach ($resultats as $index => $resultat) {
    echo "<tr>";
    echo "<td>" . ($index + 1) . "</td>";
    echo "<td>" . htmlspecialchars($resultat['id']) . "</td>";
    echo "<td>" . htmlspecialchars($resultat['temps']) . "</td>";
    echo "<td>" . (($index < 5) ? "Qualifié" : "Éliminé") . "</td>"; // Afficher le statut
    echo "</tr>";
}

echo "</table>";

// Fermer la connexion
$connexion->close();
?>