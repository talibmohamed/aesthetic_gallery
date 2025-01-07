<?php

// Start the session
session_start();

// Include necessary files
require_once 'model/db.php';
require_once 'model/user.php';

// Test if the user is already connected
if (isset($_SESSION['id_user'])) {

    // print a message to the user to inform them that they are already connected and redirect them to the home page after a few seconds
    echo "You are already connected. You will be redirected to the home page in a few seconds.";
    header("refresh:3;url=/aesthetic_gallery");
    // header("Location: /aesthetic_gallery");
    exit;
}

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
            // Store user information in session
            $_SESSION['id_user'] = $user['Id_user'];
            $_SESSION['user_type'] = $user['user_type'];
            $_SESSION['pseudo'] = $user['pseudo'];

            // Successful login, redirect to home page
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
