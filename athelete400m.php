<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Style du tableau */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-size: 18px;
    text-align: left;
    background-color: white;
    color: black;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

/* En-tête du tableau */
table th {
    background-color: #6a0dad;
    color: white;
    padding: 12px;
    text-transform: uppercase;
}

/* Cellules */
table td, table th {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

/* Lignes alternées */
table tr:nth-child(even) {
    background-color: #f2f2f2;
}

/* Effet au survol */
table tr:hover {
    background-color: #ddd;
    transition: 0.3s;
}

/* Responsive */
@media screen and (max-width: 600px) {
    table {
        font-size: 14px;
    }
}

    </style>
</head>
<body>
    
</body>
</html>
<?php
include("sql.php");
// Valeur commune du champ
$valeur_commune = "400m";

// Requête SQL
$sql = "SELECT id, name, firstname, penality, nationality FROM athelete WHERE distance = '$valeur_commune'";
$result = $conn->query($sql);

// Affichage des résultats
if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Pénalité</th><th>Nationalité</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row["id"]) . "</td>
                <td>" . htmlspecialchars($row["name"]) . "</td>
                <td>" . htmlspecialchars($row["firstname"]) . "</td>
                <td>" . htmlspecialchars($row["penality"]) . "</td>
                <td>" . htmlspecialchars($row["nationality"]) . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Aucun athlète trouvé.";
}

// Fermer la connexion
$conn->close();
?>

