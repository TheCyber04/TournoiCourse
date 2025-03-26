
<?php 
session_start();
if (!isset($_SESSION["tentatives"])) {
    $_SESSION["tentatives"] = 0;
}?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arbitre</title>
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
    <h1>Vérification arbitre</h1>
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
            $requEte= "SELECT identifiant,mot_de_passe FROM acteur_speciaux WHERE email =? AND password=? AND type='arbitre' ";
            $stmt = $connexion->prepare($requEte); //Requête préparée pour plus de sécurité

            $stmt->bind_param("ss",$mAil,$mdP);
            $stmt->execute(); 
            $result = $stmt->get_result(); 
            $row=$result->fetch_row();

            //Comparaison
            if($row){
                $_SESSION["tentatives"] = 0;
               header("Location: Saisie_result_arbitre.php");
              exit(); 
            else{
                if($_SESSION["tentatives"]<3){
                echo "<p class='error'>Accès refusé: email ou mot de passe incorrect</p>";
                echo'<a href="AuthentificationArbitre.html"> Retour</a>';
                }
                else{
                    echo"Nombre maximal de tentatives dépassé";
                }}
            }
            mysqli_close($connexion);
        }
        ?>  
    </div>
</body>
</html>

