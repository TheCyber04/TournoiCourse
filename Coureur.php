<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations coureurs</title>
</head>
<body>
  <?php 
  $tentative=0;
//Récupération des données
$mAil=$_REQUEST["email"];
$mdP=$_REQUEST["mot_de_passe"];

  //Connexion au serveur  de la base de données test
  $nomServeur="localhost";
  $user="root";
  $motPasse="";
  $nomBase="projet";
  $connexion=mysqli_connect($nomServeur,$user,$motPasse,$nomBase);

  //Contrôle de la connexion
if($connexion->connect_error){
    die("Erreur lors de la connexion à la base de données".$connexion->connect_error);
}

else{
    //Contrôle de saisie

    $requEte= "SELECT email,password FROM athelete WHERE email =? AND password=? ";
    $stmt = $connexion->prepare($requEte); //Requête préparée pour plus de sécurité

$stmt->bind_param("ss",$mAil,$mdP); //exécution de la requête 
$stmt->execute(); 
$result = $stmt->get_result(); 
$row=$result->fetch_row();

//Comparaison
if($row){
  $requETe= "SELECT  a.name, a.firstname, a.email, a.nationality, a.distance, a.date_de_naissance, a.penality, a.status,
(SELECT c.temps FROM course_athelete c WHERE c.athelete_id = a.id LIMIT 1) AS temps 
FROM athelete a WHERE email ='$mAil' AND password='$mdP'";
  $stmT= $connexion->prepare($requETe);
  $stmT->execute();
  $rEsult=$stmT->get_result();
  $rOw=$rEsult->fetch_row();
  
  echo "Nom: ".$rOw[0]."<br>";
  echo "Prénom: ".$rOw[1]."<br>";
  echo"Courriel :".$rOw[2]."<br>";
  echo "Nationalité : ".$rOw[3]."<br>";
  echo "Course: ".$rOw[4]."mètres<br>";
  echo"Date de naissance: ".$rOw[5]."<br>";
  echo"Temps: ".$rOw[8]."<br>";
  
  if( $rOw[8]==0) {
    echo"Vous n'avez pas encore couru";
  } else{
  
 
  echo"Statut: ".$rOw[7]."<br>";
  echo"pénalité: ".$rOw[6]."<br>";
 }
}





 else{
 // $tentative=$tentative+1;
 
  header("Location:index.html"); 

  mysqli_close($connexion); }
  }
 ?>  
</body>
</html>