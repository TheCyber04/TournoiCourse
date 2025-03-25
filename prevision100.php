<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau avec liens alignés</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table, th, td {
            border: 1px solid #000;
        }
        
    th {
        background-color: #007BFF;
        color: white;
    }

        th, td {
            padding: 8px;
            text-align: left;
        }
        .btn.edit {
            padding: 6px 10px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }
        .btn.edit:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php
    // Exemple de connexion et récupération des données depuis la base de données
    // Remplacez ces lignes par votre propre connexion et requête
    $conn = new mysqli("localhost", "root", "", "test");
    if ($conn->connect_error) {
        die("Erreur de connexion : " . $conn->connect_error);
    }
    
    $sql = "SELECT * FROM course WHERE id <=3"; // Remplacez 'votre_table' par le nom de votre table
    $result = $conn->query($sql);

    $count = 1; // Compteur pour générer le lien correspondant

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                  <th>ID</th>
                  <th>Date</th>
                  <th>Lieu</th>
                  <th>Type</th>
                  <th>Arbitre</th>
                  <th>Action</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            // Création du lien avec le fichier run correspondant et l'id de la ligne
            $runFile = "run" . $count . ".php?id=" . urlencode($row["id"]);
            echo "<tr>
                    <td>" . htmlspecialchars($row["id"]) . "</td>
                    <td>" . htmlspecialchars($row["date"]) . "</td>
                    <td>" . htmlspecialchars($row["lieu"]) . "</td>
                    <td>" . htmlspecialchars($row["type"]) . "</td>
                    <td>" . htmlspecialchars($row["arbitre"]) . "</td>
                    <td><a href='" . $runFile . "' class='btn edit'>Coureur " . $count . "</a></td>
                  </tr>";
            $count++;
        }
        echo "</table>";
    } else {
        echo "Aucun athlète trouvé.";
    }

    $conn->close();
    ?>
</body>
</html>
