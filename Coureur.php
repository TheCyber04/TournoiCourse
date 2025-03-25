<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations coureurs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }

        .container {
            width: 50%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 20px;
        }

        .container p {
            font-size: 16px;
            line-height: 1.5;
            color: #333;
        }

        .container p strong {
            color: #007bff;
        }

        .error {
            color: red;
            font-weight: bold;
        }

        .success {
            color: green;
            font-weight: bold;
        }

        .details {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            padding: 10px;
            margin-top: 20px;
            border-radius: 8px;
        }

        .details p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <h1>Informations du coureur</h1>
    <div class="container">
        <?php 
        //Récupération des données
        $mAil=$_REQUEST["email"];
        $mdP=$_REQUEST["mot_de_passe"];

        //Connexion au serveur  de la base de données test
        $nomServeur="localhost";
        $user="root";
        $motPasse="";
        $nomBase="test";
        $connexion=mysqli_connect($nomServeur,$user,$motPasse,$nomBase);

        //Contrôle de la connexion
        if($connexion->connect_error){
            die("<p class='error'>Erreur lors de la connexion à la base de données: ".$connexion->connect_error."</p>");
        }
        else{
            //Contrôle de saisie
            $requEte= "SELECT email,password FROM athelete WHERE email =? AND password=? ";
            $stmt = $connexion->prepare($requEte); //Requête préparée pour plus de sécurité

            $stmt->bind_param("ss",$mAil,$mdP);
            $stmt->execute(); 
            $result = $stmt->get_result(); 
            $row=$result->fetch_row();

            //Comparaison
            if($row){
                $requETe= "SELECT a.name, a.firstname, a.email, a.nationality, a.distance, a.date_de_naissance, a.penality, a.status,
                (SELECT c.temps FROM course_athelete c WHERE c.athelete_id = a.id LIMIT 1) AS temps 
                FROM athelete a WHERE email ='$mAil' AND password='$mdP'";
                $stmT= $connexion->prepare($requETe);
                $stmT->execute();
                $rEsult=$stmT->get_result();
                $rOw=$rEsult->fetch_row();
                
                echo "<div class='details'>";
                echo "<p><strong>Nom:</strong> ".$rOw[0]."</p>";
                echo "<p><strong>Prénom:</strong> ".$rOw[1]."</p>";
                echo "<p><strong>Courriel:</strong> ".$rOw[2]."</p>";
                echo "<p><strong>Nationalité:</strong> ".$rOw[3]."</p>";
                echo "<p><strong>Course:</strong> ".$rOw[4]." mètres</p>";
                echo "<p><strong>Date de naissance:</strong> ".$rOw[5]."</p>";
                echo "<p><strong>Temps:</strong> ".$rOw[8]."</p>";
                
                if( $rOw[8]==0) {
                    echo "<p class='error'>Vous n'avez pas encore couru</p>";
                } else{
                    echo "<p><strong>Statut:</strong> ".$rOw[7]."</p>";
                    echo "<p><strong>Pénalité:</strong> ".$rOw[6]."</p>";
                }
                echo "</div>";
            }
            else{
                echo "<p class='error'>Accès refusé: email ou mot de passe incorrect</p>";
                echo'<a href="index.php"> Retour</a>';
            }
            mysqli_close($connexion);
        }
        ?>  
    </div>
</body>
</html>
