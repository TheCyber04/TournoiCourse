<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Athlète</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        .message {
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
            font-size: 18px;
        }

        .success {
            background-color: #007bff;
            color: white;
        }

        .error {
            background-color: #007bff;
            color: white;
        }

        .info {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>

    <div class="container">
        <?php
        $db_server="localhost";
        $db_user= "root";
        $db_pass= "";
        $db_name= "test";
        $connexion="";

        $connexion = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

        $pays = $_REQUEST["pays"];
        $nom = $_REQUEST["nom"];
        $nickname = $_REQUEST["prenom"];
        $naissance = $_REQUEST["date_de_naissance"];
        $annee = date("Y", strtotime($naissance));
        $aDresse = $_REQUEST["adresse"];
        $log_in = $_REQUEST["login"];
        $paSseword = $_REQUEST['mdp'];
        //$licence = $_REQUEST["Licence"];
        $pAsseword = $_REQUEST['mDp'];
        $distance = $_REQUEST["distance"];
        $email = $_REQUEST["mail"];
        
        $dateActuelle = date("Y");
if((float)$pays || (float)$nom || (float)$nickname || (float)$aDresse){
    echo"Format incorrect du nom, prénom, pays ou adresse";
                                                                      } 
else{

        if (($dateActuelle - $annee) >= 18) {
            if (strcmp($paSseword, $pAsseword) != 0) {
                echo "<div class='message error'>Erreur: les deux mots de passe ne sont pas identiques!</div>";
            } else {
                // Vérifier si l'email existe déjà
                $email = mysqli_real_escape_string($connexion, $email); // Sécurisation des entrées
                $sql_check = "SELECT * FROM athelete WHERE email='$email'";
                $result = mysqli_query($connexion, $sql_check);

                

                if (mysqli_num_rows($result) > 0) {
                    echo "<div class='message error'>Erreur : cet email est déjà utilisé.</div>";
                } else {
                    // Insertion dans la base de données
                    $sql = "INSERT INTO athelete (name, firstname, date_de_naissance, password, distance, nationality, email) 
                            VALUES ('$nom', '$nickname', '$naissance', '$paSseword', '$distance', '$pays', '$email')";

                    if (mysqli_query($connexion, $sql)) {
                        echo "<div class='message success'>Inscription réussie!</div>";
                    } else {
                        echo "<div class='message error'>Erreur : " . mysqli_error($connexion) . "</div>";
                    }
                }
            }
        } else {
            echo "<div class='message error'>Désolé, vous êtes trop jeune pour participer!</div>";
        }}
        ?>
    </div>

</body>
</html>
