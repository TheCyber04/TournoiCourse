<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e9ecef;
            color: #495057;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        h1 {
            color: #007bff;
            margin-bottom: 10px;
            font-size: 2.5em;
        }

        form {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 400px;
            margin: 20px auto;
            transition: transform 0.3s;
        }

        form:hover {
            transform: scale(1.02);
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
            font-size: 1em;
        }

        input[type="text"],
        input[type="date"],
        input[type="email"],
        input[type="password"],
        input[type="tel"],
        input[type="number"],
        select {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 1em;
            transition: border-color 0.3s, box-shadow 0.3s;
            box-sizing: border-box;
        }

        input:focus, select:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            outline: none;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s, transform 0.3s;
            width: 100%;
            margin-top: 15px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        .error {
            color: red;
            font-weight: bold;
            margin-top: 10px;
        }

        .success {
            color: green;
            font-weight: bold;
            margin-top: 10px;
        }

        @media (max-width: 400px) {
            form {
                padding: 20px;
            }
            h1 {
                font-size: 2em;
            }
        }
    </style>
</head>
<body>
    <h1>Pénalités</h1>
    
    <form method="POST" action="">
        <label for="Distance">Distance :</label>
        <select name="distance" id="Distance" required>
            <option value="100m">100m</option>
            <option value="400m">400m</option>
            <option value="1000m">1000m</option>
        </select>

        <label for="numero">Numéro coureur :</label>
        <input type="number" name="numero" required />

       

        <label for="penality">Pénalités :</label>
        <select name="penality" id="penality" required>
            <option value="Faux départ">Faux départ</option>
            <option value="Sortie de couloir">Sortie de couloir</option>
            <option value="Obstruction volontaire">Obstruction volontaire</option>
            <option value="Aide extérieure">Aide extérieure</option>
            <option value="Non-respect de la ligne d'arrivée">Non-respect de la ligne d'arrivée</option>
            <option value="Chaussures non conformes">Chaussures non conformes</option>
            <option value="Sans objet">Sans objet</option>
        </select>

        <input type="submit" value="Soumettre" />
    </form>

    <?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "test";

    $connexion = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
    if (!$connexion) {
        die("<p class='error'>Erreur de connexion à la base de données.</p>");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $athlete_id = $_POST["numero"] ?? "";
        $penality = $_POST["penality"] ?? "";
        
        $verif_sql = "SELECT id FROM athelete WHERE id = ?";
        $stmt_verif = $connexion->prepare($verif_sql);
        $stmt_verif->bind_param("i", $athlete_id);
        $stmt_verif->execute();
        $result_verif = $stmt_verif->get_result();

        if ($result_verif->num_rows == 0) {
            echo "<p class='error'>Erreur : L'athlète avec l'ID $athlete_id n'existe pas.</p>";
        } else {
            $sql = "UPDATE athelete SET penality = ? , status = 'ELIMINE'WHERE id = ?";
            $stmt = $connexion->prepare($sql);
            $stmt->bind_param("si", $penality, $athlete_id);

            if ($stmt->execute()) {
                echo "<p class='success'>Pénalité ajoutée avec succès !</p>";
            } else {
                echo "<p class='error'>Erreur lors de l'ajout de la pénalité : " . $stmt->error . "</p>";
            }
            $stmt->close();
        }
        $stmt_verif->close();
    }
    
    $connexion->close();
    ?>
</body>
</html>
