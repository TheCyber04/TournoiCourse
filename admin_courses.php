<?php
session_start();

// Vérification de l'authentification
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}

// Connexion à la base de données
try {
    $pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Variable pour stocker les messages
$message = '';
$messageType = '';

// Gestion des actions
if (isset($_POST['action'])) {
    try {
        if ($_POST['action'] == 'ajouter') {
            $stmt = $pdo->prepare("INSERT INTO course (type, date, lieu, arbitre) VALUES (?, ?, ?, ?)");
            $stmt->execute([$_POST['type'], $_POST['date'], $_POST['lieu'], $_POST['arbitre']]);
            $message = "Course ajoutée avec succès";
            $messageType = 'success';
        } elseif ($_POST['action'] == 'modifier') {
            $stmt = $pdo->prepare("UPDATE course SET type=?, date=?, lieu=?, arbitre=? WHERE id=?");
            $stmt->execute([$_POST['type'], $_POST['date'], $_POST['lieu'], $_POST['arbitre'], $_POST['id']]);
            $message = "Course modifiée avec succès";
            $messageType = 'success';
        } elseif ($_POST['action'] == 'supprimer') {
            $stmt = $pdo->prepare("DELETE FROM course WHERE id=?");
            $stmt->execute([$_POST['id']]);
            $message = "Course supprimée avec succès";
            $messageType = 'success';
        }
    } catch(PDOException $e) {
        $message = "Erreur : " . $e->getMessage();
        $messageType = 'error';
    }
}

// Récupération des courses
try {
    $courses = $pdo->query("SELECT * FROM course")->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    $message = "Erreur de récupération des courses : " . $e->getMessage();
    $messageType = 'error';
    $courses = [];
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Courses</title>
    <link rel="stylesheet" href="admin_courses.css">
</head>
<body>
    <div class="container">
        <?php if (!empty($message)): ?>
            <div class="message <?= $messageType ?>-message">
                <?= htmlspecialchars($message) ?>
            </div>
        <?php endif; ?>

        <h1>Administration des Courses</h1>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Lieu</th>
                    <th>Arbitre</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($courses as $course): ?>
                    <tr>
                        <td><?= htmlspecialchars($course['id']) ?></td>
                        <td><?= htmlspecialchars($course['type']) ?></td>
                        <td><?= htmlspecialchars($course['date']) ?></td>
                        <td><?= htmlspecialchars($course['lieu']) ?></td>
                        <td><?= htmlspecialchars($course['arbitre']) ?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="id" value="<?= $course['id'] ?>">
                                <input type="text" name="type" value="<?= htmlspecialchars($course['type']) ?>" required>
                                <input type="date" name="date" value="<?= $course['date'] ?>" required>
                                <input type="text" name="lieu" value="<?= htmlspecialchars($course['lieu']) ?>" required>
                                <input type="text" name="arbitre" value="<?= htmlspecialchars($course['arbitre']) ?>" required>
                                <button type="submit" name="action" value="modifier">Modifier</button>
                                <button type="submit" name="action" value="supprimer" class="delete-button">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Ajouter une Course</h2>
        <form method="post">
            <input type="text" name="type" placeholder="Type" required>
            <input type="date" name="date" required>
            <input type="text" name="lieu" placeholder="Lieu" required>
            <input type="text" name="arbitre" placeholder="Arbitre" required>
            <button type="submit" name="action" value="ajouter">Ajouter</button>
        </form>
    </div>
</body>
</html>