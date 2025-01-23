<?php
// Initialize variables and database connection
session_start();

// Check if user artist $_SESSION['artist'] = true;
if ($_SESSION['artist'] !== true) {
    header('Location: /aesthetic_gallery');
    exit;
}


$title = "Add Artwork";
require_once 'model/db.php';
require_once 'model/Art.php';
$database = new Database();
$db = $database->getConnection();

$errors = [];
$imagePath = '';
$success = '';  // Initialize success message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars(trim($_POST['nom']));
    $description = htmlspecialchars(trim($_POST['description']));
    $prix = htmlspecialchars(trim($_POST['prix']));
    $mode_vente = isset($_POST['mode_vente']) ? $_POST['mode_vente'] : '';
    $offre = htmlspecialchars(trim($_POST['offre']));
    $artiste_Id_Artiste = $_SESSION['id_user'];

    // Handle file upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $imageTmpPath = $_FILES['image']['tmp_name'];
        $originalImageName = $_FILES['image']['name'];
        $fileExtension = pathinfo($originalImageName, PATHINFO_EXTENSION);

        // Generate a unique file name
        $uniqueImageName = uniqid('art_') . '.' . $fileExtension;

        $targetDir = __DIR__ . '/../uploads/';
        $imagePath = 'uploads/' . $uniqueImageName;

        // Ensure the uploads directory exists
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        // Move the uploaded file to the target directory
        if (move_uploaded_file($imageTmpPath, $targetDir . $uniqueImageName)) {
            $success = "File uploaded successfully.";
        } else {
            $errors['image'] = "Error uploading the file.";
        }
    }

    // Validate other inputs
    if (empty($nom)) {
        $errors['nom'] = "Artwork name is required.";
    }
    if (empty($description)) {
        $errors['description'] = "Description is required.";
    }
    if (empty($prix)) {
        $errors['prix'] = "Price is required.";
    }
    if (empty($mode_vente)) {
        $errors['mode_vente'] = "Sale mode is required.";
    }

    // If no errors, proceed to insert the artwork
    if (empty($errors)) {
        $art = new Art($db);
        $result = $art->createArtwork($nom, $description, $prix, $mode_vente, $offre, $artiste_Id_Artiste, $imagePath);

        if ($result) {
            $success = 'Artwork added successfully.';
        } else {
            $errors['general'] = 'Failed to add artwork. Please try again.';
        }
    }
}

require_once 'view/upload.view.php';
