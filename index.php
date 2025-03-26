<?php
// Connexion à la base de données
$mysqli = new mysqli("localhost", "root", "", "test");

// Vérifier la connexion
if ($mysqli->connect_error) {
    die("Échec de connexion : " . $mysqli->connect_error);
}

// Requête SQL pour récupérer toutes les courses
$sql = "SELECT * FROM course ORDER BY date";
$result = $mysqli->query($sql);


// Initialiser un tableau vide pour stocker les courses
$courses = [];

// Si des résultats sont trouvés, les ajouter au tableau
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $courses[] = [
            'date' => $row['date'],  
            'title' => $row['id'],       
        ];
    }
} else {
    echo "Aucune course disponible";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Championanat de course</title>
       <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"> <!-- Leaflet CSS -->
</head>
<body>
    <header>
        <a href="#" class="logo"><span>Mon</span>Logo</a>
        <ul class="navbar">
            <li><a href="#type-course">Categories</a></li>
            <li><a href="#calendrier-course">Calendrier</a></li>
            <li><a href="#carte-course">Ma carte</a></li>
            <li><a href="#contact">Nous contacter</a></li>
            <li><a href="media.html">Media</a></li>
               <li><a href="login.php">Admin</a></li>
             <li><a href="login_organisateur.php">Organisateur</a></li>
        </ul>
    
        <div class="nav-icon">
          
            <a href="#" id="search-icon"><i class='bx bx-search' ></i></a>
            <a href="#" id="user-icon"><i class='bx bx-user'></i></a>
        </div>

    </header>

    <!-- script pour le défilement -->
    <script>
        // Récupérer l'élément header
        const header = document.querySelector('header');

        // Écouter l'événement de défilement
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {  // Si la page est scrollée de plus de 50px
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
            });

    </script>    

    
<!-- Overlay pour le formulaire -->
<div id="overlay"></div>

<!-- Formulaire rideau -->
<div id="loginForm" class="form-slide">
    <span class="close-btn" id="closeForm">&times;</span>
    <h2>Connexion</h2>
   
    <form action="Coureur.php" method="POST">
    <label for="email">Email</label>
    <input name="email" type="email" id="email" placeholder="Entrez votre email">
    
    <label for="password">Mot de passe</label>
    <input name="mot_de_passe" type="password" id="password" placeholder="Entrez votre mot de passe">
    
    <button type="submit">Se Connecter</button> 
</form>

    <p>Pas encore de compte ? <a href="InscriptionCoureur.html">S'inscrire</a></p>
</div>

<script src="script1.js"></script>

<section class="banniere" id="banniere">
        <div class="contenue">
            <h2>Des Courses Palpitantes</h2>
            <p>Enfilez vos baskets, dépassez vos limites et vibrez au rythme de la course ! </p>
            <div class="search-box" id="search-box">
                <input type="text" class="search-input" placeholder="pays">
                <input type="text" class="search-input" placeholder="Course">
                <input type="text" class="search-input" placeholder="Mot clé">
                 <input type="submit" value="rechercher">
            </div>    
             
        </div> 
        
    </section>

    <!--script pour déployer ma search-box -->
    <script>
        document.getElementById("search-icon").addEventListener("click", function(event) {
            event.preventDefault();
            let searchBox = document.getElementById("search-box");
            searchBox.classList.toggle("active");
        });

    </script>


    <section class="type-course" id="type-course">
        <div class="titre">
            <h2 class="titre-texte"><span>T</span>ype <span>D</span>e <span>C</span>ourses</h2>
            <p>Découvrez une variété de courses et choisissez celle qui correspond à votre passion, votre énergie et vos défis !</p>
        </div>
        
        <div class="contenue">
            <div class="carte">
                <div class="card-image" style="background-image: url(./100m.jpg);">
                    <div class="card-texte">
                        <h2 class="title"> 100 métres</h2>
                    </div>
                </div>
                <div class="carte-contenue">
                    <a href="prevision100.php" class="btn1">Voir Plus</a>
                </div>
            </div>

            <div class="carte">
                <div class="card-image" style="background-image: url(./800m.jpg);">
                    <div class="card-texte">
                        <h2 class="title"> 400 métres</h2>
                    </div>
                </div>
                <div class="carte-contenue">
                    <a href="prevision400.php" class="btn1">Voir Plus</a>
                </div>
            </div>

            <div class="carte">
                <div class="card-image" style="background-image: url(./1000m.jpg);">
                    <div class="card-texte">
                        <h2 class="title"> 1000 métres</h2>
                    </div>
                </div>
                <div class="carte-contenue">
                    <a href="prevision1000.php" class="btn1">Voir Plus</a>
                </div>
            </div>
        </div>
    </section>
    
       <section class="calendrier-course" id="calendrier-course">
        <div class="titre">
            <h2 class="titre-texte"><span>C</span>alendrier <span>D</span>es <span>C</span>ourses</h2>
            <p> Ne manquez aucune course ! <br> Consultez notre calendrier et planifiez votre prochaine aventure sportive dès maintenant ! 🏃‍♂️🔥</p>
        </div>
    
        <div class="contenue">
            <div class="list-courses">
                <h3>Liste des Courses</h3>
                <ul>
                <?php if (count($courses) > 0): ?>
                    <?php foreach ($courses as $course): ?>
                        <li><span class="date"><?= date("d M", strtotime($course['date'])) ?></span> - Course <?= $course['id'] ?></li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li>Aucune course disponible</li>
                <?php endif; ?>
                </ul>
            </div>

    
            <div class="calendrier">
                <div class="header">
                    <div class="mois"></div>
                    <div class="btns">
                        <div class="btn auj-btn">
                            <i class="fas fa-calendar-day"></i>
                        </div>
                        <div class="btn avant-btn">
                            <i class="fas fa-chevron-left"></i>
                        </div>
                        <div class="btn apres-btn">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                </div>
                <div class="jour-sem">
                    <div class="jour">Lun</div>
                    <div class="jour">Mar</div>
                    <div class="jour">Mer</div>
                    <div class="jour">Jeu</div>
                    <div class="jour">Vend</div>
                    <div class="jour">Sam</div>
                    <div class="jour">Dim</div>
                </div>
                <div class="jours">
                    <!-- Calendrier dynamique ici -->
                </div>
            </div>
        </div>

        <!-- Passer les courses au script JS -->
        <script>
            const courses = <?php echo json_encode($courses); ?>;
        </script>
    
        <!-- Inclusion du fichier JavaScript -->
        <script src="script.js"></script>

    </section>



    <section class="carte-course" id="carte-course">

        <div class="titre">
            <h2 class="titre-texte"><span>M</span>a <span>C</span>arte <span>I</span>nteractive</h2>
            <p> 📍 Localisez vos courses excitantes sur la carte et préparez-vous à vivre des sensations inoubliables !</p>
        </div>

            <div id="map-container">
                <div id="map" style="height: 400px;"></div>
            </div>
        </div>
    </section>
    
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script> <!-- Leaflet JS -->

    <script>
        // Initialisation de la carte
        const map = L.map('map').setView([40.4168, -3.7038], 6); // Centre de l'Espagne

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Ajout de marqueurs pour trois stades fictifs

        // Ajout de marqueurs pour trois stades en Espagne

        // Camp Nou (Barcelone)
        L.marker([41.3809, 2.1228]).addTo(map)
            .bindPopup('Stade C: Camp Nou - Barcelone')
            .openPopup();

        // Santiago Bernabéu (Madrid)
        L.marker([40.4531, -3.6884]).addTo(map)
            .bindPopup('Stade B: Santiago Bernabéu - Madrid')
            .openPopup();

        // Estadio Ramón Sánchez Pizjuán (Séville)
        L.marker([37.3841, -5.9706]).addTo(map)
            .bindPopup('Stade A: Ramón Sánchez Pizjuán - Séville')
            .openPopup();
        </script>

    <section class="contact-section" id="contact">
        <div class="titre">
            <h2 class="titre-texte"><span>N</span>ous <span>C</span>ontacter </h2>
            <p>Laissez votre avis ou contactez nous pour vos suggestions</p>
        <div class="contact-container">
            <div class="contact-info">
                <h2 class="contact-title">Nos Coordonnées</h2>
                <ul class="contact-details">
                    <li><strong>Téléphone :</strong> +33 1 23 45 67 89</li>
                    <li><strong>Email :</strong> contact@exemple.com</li>
                    <li><strong>Adresse :</strong> 123 Rue Exemple, Paris, France</li>
                    <li><strong>Heures d'ouverture :</strong> Lundi - Vendredi: 9h - 18h</li>
                </ul>
            </div>
            <div class="contact-form">
                <h2 class="form-title">Formulaire de Contact</h2>
                <form action="#" method="POST">
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" id="name" name="name" required placeholder="Votre nom">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required placeholder="Votre email">
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" required placeholder="Votre message"></textarea>
                    </div>
                    <button type="submit" class="submit-btn">Envoyer</button>
                </form>
            </div>
        </div>
    </section>
    
    
    <section class="footer">
        <div class="reseau">
            <a href="#" class="fab fa-facebook"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
        </div>
        <div class="liens">
            <a href="#">Categories</a>
            <a href="#">Calendrier</a>
            <a href="#">Ma Carte</a>
            <a href="#">Nous contacter</a>
            <a href="media.html">Medias</a>
        </div>   
    </section>
    
</body>
</html>
