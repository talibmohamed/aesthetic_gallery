<?php
// Informations de connexion
$host = '127.0.0.1'; // ou localhost
$dbname = 'aesthetic_gallery'; // Remplacez par le nom de votre base de données
$username = 'root'; // Par défaut dans Laragon
$password = ''; // Mot de passe par défaut vide dans Laragon

try {
    // Connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Configuration des options PDO (facultatif mais recommandé)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    echo "Connexion réussie à la base de données !";
} catch (PDOException $e) {
    // Gestion des erreurs
    die("Erreur de connexion : " . $e->getMessage());
}

$artistes = [
    [
        'photo' => 'artist-photo1.jpg',
        'oeuvre' => 'artwork-image1.jpg',
        'nom' => 'Artiste 1',
        'prix' => 150,
        'description' => "Description de l'œuvre 1."
    ],
    [
        'photo' => 'artist-photo2.jpg',
        'oeuvre' => 'artwork-image2.jpg',
        'nom' => 'Artiste 2',
        'prix' => 200,
        'description' => "Description de l'œuvre 2."
    ],
    [
        'photo' => 'artist-photo3.jpg',
        'oeuvre' => 'artwork-image3.jpg',
        'nom' => 'Artiste 3',
        'prix' => 300,
        'description' => "Description de l'œuvre 3."
    ],
];

foreach ($artistes as $artiste) {
    echo "Photo de l'artiste: " . $artiste['photo'] . "\n";
    echo "Oeuvre: " . $artiste['oeuvre'] . "\n";
    echo "Nom de l'artiste: " . $artiste['nom'] . "\n";
    echo "Prix: " . $artiste['prix'] . "€\n";
    echo "Description: " . $artiste['description'] . "\n\n";
}
?>


