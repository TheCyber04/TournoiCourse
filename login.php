<?php
session_start();

// Désactiver le rapport d'erreurs pour la production
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connexion à la base de données avec gestion des erreurs
try {
    $pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);
} catch(PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Vérification du formulaire
$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Nettoyer les entrées
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    
    try {
        // Requête préparée sécurisée
        $stmt = $pdo->prepare("SELECT * FROM admins WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Vérification directe du mot de passe
        if ($admin && $password === $admin['mot_de_passe']) {
            // Régénérer l'ID de session pour prévenir la fixation de session
            session_regenerate_id(true);
            
            // Stocker des informations de session
            $_SESSION['admin'] = $admin['id'];
            
            // Journalisation de la connexion (optionnel)
            error_log("Connexion admin réussie : " . $email . " à " . date('Y-m-d H:i:s'));
            
            header('Location: admin_courses.php');
            exit();
        } else {
            $error = "Email ou mot de passe incorrect";
            // Journalisation des tentatives de connexion échouées
            error_log("Tentative de connexion échouée : " . $email . " à " . date('Y-m-d H:i:s'));
        }
    } catch(PDOException $e) {
        $error = "Erreur de système : Veuillez réessayer ultérieurement";
        error_log("Erreur de base de données : " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .error-message {
            color: #d9534f;
            background-color: #f2dede;
            border: 1px solid #d9534f;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            color: #666;
        }

        input {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Connexion Admin</h1>
        
        <?php if (!empty($error)): ?>
            <div class="error-message">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>
        
        <form method="post">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Se Connecter</button>
        </form>
    </div>
</body>
</html>