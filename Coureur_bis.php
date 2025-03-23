<?php
$db_server="localhost";
$db_user= "root";
$db_pass= "";
$db_name= "projet";
$connexion="";

$connexion= mysqli_connect($db_server,$db_user,$db_pass,$db_name);

$pays=$_REQUEST["pays"];
$nom=$_REQUEST["nom"];
$nickname=$_REQUEST["prenom"];
$naissance=$_REQUEST["date_de_naissance"];
$annee=date("Y", strtotime($naissance));
$aDresse=$_REQUEST["adresse"];
$log_in=$_REQUEST["login"];
$paSseword= $_REQUEST['mdp'];
$licence=$_REQUEST["Licence"];
$pAsseword= $_REQUEST['mDp'];
$distance=$_REQUEST["distance"];
$email=$_REQUEST["mail"];
$dateActuelle=date("Y");
//Recupere l'annee actuelle 


if(($dateActuelle-$annee)>=18){
    if(strcmp($paSseword,$pAsseword)!=0){
        echo "Erreur les deux mots de passe ne sont pas identiques!";
    } else{


//Stockage des informations dans la base de donnees

// Vérifier si l'email existe déjà
$email = mysqli_real_escape_string($connexion, $email); // Sécurisation des entrées
$sql_check = "SELECT * FROM athelete WHERE email='$email'";
$result = mysqli_query($connexion, $sql_check);

if (mysqli_num_rows($result) > 0) {
    echo "Erreur : cet email est déjà utilisé.";
} else {
    // Insertion uniquement si l'email n'existe pas
    $sql = "INSERT INTO athelete (name, firstname, date_de_naissance, login, password, license, distance, nationality, email) 
            VALUES ('$nom', '$nickname', '$naissance', '$log_in', '$paSseword', '$licence', '$distance', '$pays', '$email')";

    if (mysqli_query($connexion, $sql)) {
        echo "Inscription réussie.";
    } else {
        echo "Erreur : " . mysqli_error($connexion);
    }
}

    }

}


if(($dateActuelle-$annee)<18) {
    echo "Désolé, vous êtes trop jeune pour participer!";
}

?>
