<?php
$course_id = $_GET['id'] ?? null;
$date_course = $_GET['date'] ?? "";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
    <style>
        /*  Style global */
        body {
            font-family: 'Arial', sans-serif;
            background: white;
            color: rgb(15, 11, 243);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* 📦 Conteneur central */
        .container {
            text-align: center;
            animation: fadeIn 1s ease-in-out;
        }

        /* 📜 Carte de confirmation */
        .card {
            background: rgb(15, 11, 243);
            color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            animation: slideUp 0.8s ease-out;
        }

        /* ✅ Icône Check */
        .checkmark {
            font-size: 50px;
            font-weight: bold;
            color: white;
            background: rgba(255, 255, 255, 0.2);
            display: inline-block;
            padding: 15px;
            border-radius: 50%;
            margin-bottom: 20px;
            animation: scaleIn 0.5s ease-in-out;
        }

        /* 🏠 Bouton Retour */
        .btn {
            display: inline-block;
            background: white;
            color: rgb(15, 11, 243);
            padding: 10px 20px;
            margin-top: 15px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
        }

        .btn:hover {
            background: rgba(255, 255, 255, 0.8);
            color: rgb(15, 11, 243);
        }

        /* 🎬 Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                transform: translateY(30px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes scaleIn {
            from {
                transform: scale(0.5);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="checkmark">
                ✔
            </div>
            <h1>Course enregistrée avec succès !</h1>
            <p>Votre course a bien été ajoutée à la base de données.</p>
            <a href="index.php?ajouter=true&id=<?= $course_id ?>&date=<?= $date_course ?>" class="btn">
                Ajouter à l'accueil
            </a>        
</div>
    </div>
</body>
</html>
