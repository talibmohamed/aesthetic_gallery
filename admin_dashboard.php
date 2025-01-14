<?php
session_start();

// Vérifier si l'administrateur est connecté
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin_login.html');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Bienvenue sur le tableau de bord administrateur</h1>
    <p>Cette page est sécurisée et accessible uniquement par l'administrateur.</p>
    <a href="logout.php">Déconnexion</a>
</body>
</html>