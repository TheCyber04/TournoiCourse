<?php
// Paramètres de connexion à la base de données
$host = 'localhost'; // Hôte de la base de données
$dbname = 'test'; // Nom de la base de données
$username = 'root'; // Nom d'utilisateur
$password = ''; // Mot de passe

// Connexion à la base de données MySQL
$mysqli = new mysqli($host, $username, $password, $dbname);

// Vérification de la connexion
if ($mysqli->connect_error) {
    die("Échec de la connexion : " . $mysqli->connect_error);
}

// Requête SQL pour récupérer les athlètes
$sql = "SELECT id, name, firstname FROM athelete"; // La table 'athletes' doit avoir les colonnes 'id', 'name' et 'firstname'
$result = $mysqli->query($sql);

// Vérification si des athlètes ont été trouvés
if ($result->num_rows > 0) {
    // On stocke les athlètes dans un tableau associatif
    $athletes = [];
    while($row = $result->fetch_assoc()) {
        $athletes[] = $row;
    }
} else {
    $athletes = [];
}

// Fermeture de la connexion
$mysqli->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Organisateur</title>
  <style>

    :root {
      --bg-page: #e9ecef;
      --text-color: #495057;
      --primary-color: #007bff;
      --primary-hover: #0056b3;
      --secondary-color: #000000;
      --border-color: #ced4da;
      --box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      --radius: 10px;
      --transition: 0.3s;
    }

    body {
      font-family: 'Arial', sans-serif;
      background-color: var(--bg-page);
      color: var(--text-color);
      margin: 0;
      padding: 20px;
    }

    .site {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }
    .container {
      max-width: 500px;
      width: 100%;
    }

    .form-box {
      background-color: #ffffff;
      border-radius: var(--radius);
      box-shadow: var(--box-shadow);
      padding: 30px;
      transition: transform var(--transition);
    }
    .form-box:hover {
      transform: scale(1.02);
    }

    .form-box h2 {
      color: var(--secondary-color);
      margin-bottom: 20px;
      font-size: 1.5em;
      text-align: center;
    }
    .form-box p {
      color: var(--secondary-color);
      text-align: center;
    }

    .progress {
      text-align: center;
      margin-bottom: 20px;
    }
    .progress-steps {
      list-style: none;
      padding: 0;
      display: flex;
      justify-content: space-between;
    }
    .progress-steps li {
      flex: 1;
      margin: 0 5px;
      background: var(--border-color);
      color: var(--text-color);
      border-radius: var(--radius);
      padding: 10px;
      font-size: 0.9em;
      text-align: center;
    }
    .progress-steps li.active {
      background: var(--primary-color);
      color: #ffffff;
    }

    form label {
      display: block;
      margin: 10px 0 5px;
      font-weight: bold;
      font-size: 1em;
    }
    form input[type="text"],
    form input[type="time"],
    form select {
      width: 100%;
      padding: 12px;
      margin-bottom: 15px;
      border: 1px solid var(--border-color);
      border-radius: 5px;
      font-size: 1em;
      transition: border-color var(--transition), box-shadow var(--transition);
      box-sizing: border-box;
    }
    form input:focus,
    form select:focus {
      border-color: var(--primary-color);
      box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
      outline: none;
    }

    .btn-group {
      display: flex;
      flex-direction: column;
      gap: 10px;
      margin-top: 20px;
    }
    .btn-group button {
      background-color: var(--primary-color);
      color: #ffffff;
      border: none;
      padding: 12px;
      border-radius: 5px;
      cursor: pointer;
      font-size: 1em;
      transition: background-color var(--transition), transform var(--transition);
    }
    .btn-group button:hover {
      background-color: var(--primary-hover);
      transform: translateY(-2px);
    }

    @media (max-width: 400px) {
      .form-box {
        padding: 20px;
      }
      .form-box h2 {
        font-size: 1.2em;
      }
    }
  </style>
</head>
<body>
    
    <div id="page" class="site">
        <div class="container">
            <div class="form-box">
                <div class="progress">
                    <div class="logo">Planification</div>
                    <ul class="progress-steps">
                        <li class="step active">
                            <span>1</span>
                            <p>Parcours</p>
                        </li>
                        <li class="step">
                            <span>2</span>
                            <p>Athlètes</p>
                        </li>
                        <li class="step">
                            <span>3</span>
                            <p>Position</p>
                        </li>
                    </ul>
                </div>
                <form action="submit.php" method="POST">
                    <div class="form-one form-step active">
                        <div class="bg-svg"></div>
                        <h2>Définition du parcours</h2>
                        <p>Remplissez les informations de planification</p>
                        <div>
                            <label>Distance</label>
                            <select name="distance" id="distance">
                                <option value="100m">100m</option>
                                <option value="400m">400m</option>
                                <option value="1000m">1000m</option>
                            </select>
                        </div>
                        <div>
                            <label>Horaire GMT</label>
                            <input type="time" name="horaire">
                        </div>
                        <div class="date">
                            <label>Date course</label>
                            <div class="grouping">
                                <input type="number" name="jour" min="1" max="31" placeholder="JJ">
                                <input type="number" name="mois" min="1" max="12" placeholder="MM">
                                <input type="number" name="annee" min="1900" max="2050" placeholder="AAAA">
                            </div>
                        </div>
                    </div>

                    <div class="form-two form-step">
                        <div class="bg-svg"></div>
                        <h2>Coureur</h2>
                        <p>Choisissez les athlètes de cette course</p>
                        <div>
                            <label>Athlète</label>
                            <select id="athletesSelect" name="athletes[]" multiple>
                                <?php foreach ($athletes as $athlete): ?>
                                    <option value="<?= $athlete['id'] ?>">
                                        <?= $athlete['id'] . " - " . $athlete['name'] . " " . $athlete['firstname'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <p id="warning" style="color:red;"></p>
                        <h3>Athlètes sélectionnés :</h3>
                        <ul id="selectedAthletes"></ul>
                        
                        <!-- Checkbox pour générer les numéros de dossard -->
                        <div class="checkbox">
                            <input type="checkbox" id="generateNumbers" />
                            <label for="generateNumbers">Attribuer un numéro de dossard aléatoire</label>
                        </div>
                        
                    </div>

                    <div class="form-three form-step">
                        <div class="bg-svg"></div>
                        <h2>Carte</h2>
                        <div>
                            <label>Sélectionnez un stade</label>
                            <select name="stade" id="stade">
                                <option value="Stade A">Stade A</option>
                                <option value="Stade B">Stade B</option>
                                <option value="Stade C">Stade C</option>
                            </select>
                        </div>
                        <div>
                            <input type="button" value="Marquer">
                        </div>
                    </div>

                    <div class="btn-group">
                        <button type="button" class="btn-prev" disabled>Retour</button>
                        <button type="button" class="btn-next">Suivant</button>
                        <button type="submit" class="btn-submit">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="script2.js"></script>
    <script src="script3.js"></script>
</body>
</html>
