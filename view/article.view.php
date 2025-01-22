<?php
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

