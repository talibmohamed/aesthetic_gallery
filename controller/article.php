<?php

session_start();
$title = "About Us";

require_once 'model/db.php';
require_once 'model/Art.php';
require_once 'model/User.php';
$database = new Database();
$db = $database->getConnection();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $artId = (int)$_GET['id'];
    $art = new Art($db);
    $user = new User($db);
    $artData = $art->getArtworkById($artId);

    if (!$artData) {
        // Redirect to 404 if the artwork is not found
        header('Location: 404.php');
        exit;
    }

    // Get artist ID from the artwork data
    $artistId = $artData['artiste_Id_Artiste'];

    // Get other artworks by the same artist
    $otherArtworks = $art->getArtworksByArtist($artistId);

    // Get artist information (optional, you can extend your model for this)
    // Assuming you have an 'artists' table
    $artistInfo = $user->getUserById($artistId);


    // var_dump($otherArtworks);:
} else {
    // Redirect to 404 page
    header('Location: 404.php');
}

require_once 'view/article.view.php';
