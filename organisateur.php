<?php
// Paramètres de connexion à la base de données
$host = 'localhost'; // Hôte de la base de données
$dbname = 'test'; // Nom de la base de données
$username = 'root'; // Nom d'utilisateur
$password = ''; // Mot <?php
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
$sql = "SELECT id, name, firstname FROM athelete where status != 'éliminé'"; // La table 'athletes' doit avoir les colonnes 'id', 'name' et 'firstname'
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
    <link rel="stylesheet" href="styleOrga.css">
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
de passe

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
    <link rel="stylesheet" href="styleOrga.css">
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
