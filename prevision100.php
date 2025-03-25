<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des courses</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #000;
        }
        th, td {
            padding: 8px;
            border: 1px solid #000;
            text-align: left;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        .btn {
            display: inline-block;
            padding: 6px 10px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php
    $conn = new mysqli("localhost", "root", "", "test");
    if ($conn->connect_error) die("Erreur de connexion : " . $conn->connect_error);
    
    $result = $conn->query("SELECT * FROM course WHERE id <= 3");
    
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
        
        $count = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['date']}</td>
                    <td>{$row['lieu']}</td>
                    <td>{$row['type']}</td>
                    <td>{$row['arbitre']}</td>
                    <td><a href='run{$count}.php?id={$row['id']}' class='btn'>Coureur {$count}</a></td>
                  </tr>";
            $count++;
        }
        echo "</table>";
    } else {
        echo "Aucune course trouvée.";
    }
    
    $conn->close();
    ?>
</body>
</html>
