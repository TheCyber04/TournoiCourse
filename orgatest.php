<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";  

// Créer la connexion
$connexion = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($connexion->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Date actuelle
$current_date = date('Y-m-d');  // Format YYYY-MM-DD

// Requête pour récupérer le nombre de courses actives
$sql_active_courses = "SELECT COUNT(*) AS active_courses FROM course WHERE date = '$current_date'"; //risque d'erreur
$result_active_courses = $connexion->query($sql_active_courses);
$active_courses_count = 0;

if ($result_active_courses && $result_active_courses->num_rows > 0) {
    $row = $result_active_courses->fetch_assoc();
    $active_courses_count = $row['active_courses'];
}

// Requête pour récupérer uniquement la date de la prochaine course
$sql_next_race = "SELECT date FROM course WHERE date >= '$current_date' ORDER BY date ASC LIMIT 1";
$result_next_race = $connexion->query($sql_next_race);

// Initialisation des variables pour la prochaine course
$next_race_date = "Aucune course à venir";

if ($result_next_race && $result_next_race->num_rows > 0) {
    $row = $result_next_race->fetch_assoc();
    $next_race_date = $row['date'];  // Récupère uniquement la date
}

// Requête pour récupérer le nombre d'athlètes inscrits
$sql_athletes_count = "SELECT COUNT(*) AS total_athletes FROM athelete";
$result_athletes_count = $connexion->query($sql_athletes_count);
$total_athletes_count = 0;

if ($result_athletes_count && $result_athletes_count->num_rows > 0) {
    $row = $result_athletes_count->fetch_assoc();
    $total_athletes_count = $row['total_athletes'];
}

// Requête pour récupérer toutes les courses
$sql_courses = "SELECT * FROM course";
$result_courses = $connexion->query($sql_courses);


// Fermer la connexion
$connexion->close();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Organisateur - Course à Pied</title>
  <link rel="stylesheet" href="styles.css">

  <style>

    /* :root {
      --bg-page: #e9ecef;
      --text-color: #495057;
      --primary-color: #007bff;
      --primary-hover: #0056b3;
      --secondary-color: #000000;
      --box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      --radius: 10px;
      --transition-speed: 0.3s;
    }

    * {
      box-sizing: border-box;
    }
    body {
      font-family: 'Arial', sans-serif;
      background-color: var(--bg-page);
      color: var(--text-color);
      margin: 0;
      padding: 20px;
    }

    header {
      text-align: center;
      font-size: 2.5em;
      color: var(--primary-color);
      margin-bottom: 30px;
    }

    .container {
      max-width: 1000px;
      margin: 0 auto;
      padding: 0 10px;
    }

    .dashboard {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: space-between;
      margin-bottom: 20px;
    }
    .dashboard .card {
      background-color: #ffffff;
      padding: 20px;
      flex: 1 1 30%;
      box-shadow: var(--box-shadow);
      border-radius: var(--radius);
      text-align: center;
      transition: transform var(--transition-speed);
    }
    .dashboard .card:hover {
      transform: scale(1.02);
    }
    .dashboard .card h3 {
      color: var(--secondary-color);
      margin-bottom: 10px;
    }

    .manage-courses {
      background-color: #ffffff;
      padding: 20px;
      box-shadow: var(--box-shadow);
      border-radius: var(--radius);
      margin-bottom: 20px;
      transition: transform var(--transition-speed);
    }
    .manage-courses:hover {
      transform: scale(1.01);
    }
    .manage-courses h2 {
      text-align: center;
      color: var(--secondary-color);
      margin-bottom: 20px;
    }
    .button {
      background-color: var(--primary-color);
      color: #fff;
      padding: 10px 15px;
      border: none;
      cursor: pointer;
      border-radius: 5px;
      transition: background-color var(--transition-speed), transform var(--transition-speed);
    }
    .button:hover {
      background-color: var(--primary-hover);
      transform: translateY(-2px);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    table, th, td {
      border: 1px solid #ddd;
    }
    th, td {
      padding: 10px;
      text-align: left;
    }
    th {
      background-color: var(--primary-color);
      color: #fff;
    }

    @media (max-width: 600px) {
      .dashboard {
        flex-direction: column;
      }
    } */
  </style>
</head>
 <header>
        <div class="header-container">
            <h1>Tableau de Bord de l'Organisateur</h1>
            <div class="profile">
                <button class="profile-btn">👤 Profil</button>
                <div class="profile-menu">
                    <ul>
                        <li><a href="#">Mon Profil</a></li>
                        <li><a href="#">Paramètres</a></li>
                        <li><a href="#">Déconnexion</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        
        <!-- Section Tableau de Bord -->
        <div class="dashboard">
            <div class="card">
                <h3>Courses Actives</h3>
                <p><?php echo $active_courses_count; ?></p>
            </div>
            <div class="card">
                <h3>Participants Inscrits</h3>
                <p><?php echo $total_athletes_count; ?></p>
            </div>
            <div class="card">
                <h3>Prochaine Course</h3>
                <p><?php echo $next_race_date; ?></p>
            </div>
        </div>

        <!-- Section Gestion des Courses -->
        <div class="manage-courses">
            <h2>Gestion des Courses</h2>
            <a href="organisateur.php" class="button" id="create-race-btn">Créer une Nouvelle Course</a>
       

            <table>
                <tr>
                    <th>Nom de la Course</th>
                    <th>Distance</th>
                    <th>État</th>
                    <th>Actions</th>
                </tr>
               
                <?php
                // Afficher chaque course dans le tableau
                if ($result_courses && $result_courses->num_rows > 0) {
                    while ($row = $result_courses->fetch_assoc()) {
                        
                        // Récupérer les informations de chaque course
                        $course_name = $row['id'];  // Nom de la course
                        $distance = $row['type'];  // Distance de la course
                        $date_course = $row['date'];  // Date de la course

                        // Comparer la date actuelle avec celle de la course
                        $current_date = date('Y-m-d');
                        if ($date_course < $current_date) {
                            $status = "Terminé";
                            $button_text = "Résultats";
                            $page_url = "results.php?course_id=" . $course_name;
                        } elseif ($date_course == $current_date) {
                            $status = "En cours";
                            $button_text = "Détails";
                            $page_url = "athletes_details.php?course_id=" . $course_name;
                        } else {
                            $status = "À venir";
                            $button_text = "Détails";
                            $page_url = "athletes_details.php?course_id=" . $course_name;
                        }

                        // Afficher chaque ligne du tableau pour chaque course
                        echo "<tr>
                        <td>$course_name</td>
                        <td>$distance</td>
                        <td>$status</td>
                        <td><a href='$page_url' class='button'>$button_text</a></td>
                        </tr>";
                    
                    }
                } else {
                    echo "<tr><td colspan='4'>Aucune course disponible</td></tr>";
                }
                ?>

            </table>
        </div>

    </div>

    <script>
    // Récupérer le bouton par son ID
    document.getElementById('create-race-btn').addEventListener('click', function() {
        // Rediriger l'utilisateur vers la page organisateur.html
        window.location.href = 'organisateur.html';
    });
</script>

</body>
</html>
