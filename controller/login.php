<?php
// Include necessary files
require_once 'model/db.php';
require_once 'model/user.php';

// Handle login process
$errors = [];
$usernameOrEmail = '';
$password = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $usernameOrEmail = htmlspecialchars(trim($_POST['username_or_email']));
    $password = htmlspecialchars(trim($_POST['password']));

    // Validate inputs
    if (empty($usernameOrEmail)) {
        $errors['username_or_email'] = "Username or email is required.";
    }

    if (empty($password)) {
        $errors['password'] = "Password is required.";
    }

    if (empty($errors)) {
        $database = new Database();
        $db = $database->getConnection();

        $userModel = new User($db);

        $user = $userModel->getUserByEmailOrPseudo($usernameOrEmail);

        if ($user && password_verify($password, $user['password'])) {
            // Successful login, redirect to / 
            header("Location: /aesthetic_gallery");
            exit;
        } else {
            // Invalid login credentials
            $errors['login'] = "Invalid username/email or password.";
        }
    }
}

// Include the login view and pass errors
require_once 'view/login.view.php';


?>