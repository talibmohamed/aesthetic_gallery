<!-- user profile -->
<?php
session_start();
require_once 'model/db.php';
require_once 'model/user.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$id = $_SESSION['id_user'];
$userDetails = $user->getUserById($id);

if (!$userDetails) {
    echo "User not found.";
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'] ?? $userDetails['nom'];
    $prenom = $_POST['Prenom'] ?? $userDetails['Prenom'];
    $pseudo = $_POST['Pseudo'] ?? $userDetails['Pseudo'];
    $email = $_POST['Email'] ?? $userDetails['Email'];
    $date_naissance = $_POST['date_naissance'] ?? $userDetails['date_naissance'];
    $tel = $_POST['tel'] ?? $userDetails['tel'];

    if (empty($prenom)) {
        $error = "First name cannot be empty.";
    } elseif ($pseudo !== $userDetails['Pseudo']) {
        $isAvailable = $user->isPseudoAvailable($pseudo);
        if (!$isAvailable) {
            $error = "The pseudo is already taken.";
        }
    }

    if (!isset($error)) {
        $updateSuccessful = $user->updateUser($id, [
            'nom' => $nom,
            'prenom' => $prenom, // Corrected 'Prenom' to 'prenom'
            'pseudo' => $pseudo,
            'email' => $email,
            'date_naissance' => $date_naissance,
            'tel' => $tel,
        ]);

        if ($updateSuccessful) {
            $userDetails = $user->getUserById($id);
            $success = "Profile updated successfully.";
        } else {
            $error = "Failed to update profile. Please try again.";
        }
    }
}


require_once 'view/profile.view.php';
?>