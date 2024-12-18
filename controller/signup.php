<?php
$title = "Sign Up";

// Include necessary files for database and user controller
require_once 'model/db.php';
require_once 'model/user.php';

// Create a new instance of the Database class to establish a connection
$database = new Database();
$db = $database->getConnection();

// Initialize error messages and input values
// Initialize error messages for specific fields
$errors = [];

// Collect and sanitize form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars(trim($_POST['nom']));
    $prenom = htmlspecialchars(trim($_POST['prenom']));
    $pseudo = htmlspecialchars(trim($_POST['pseudo']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
    $date_naissance = htmlspecialchars(trim($_POST['date_naissance']));
    $consent = isset($_POST['consent']) ? 1 : 0; // consent is a checkbox that returns true or false
    $tel = htmlspecialchars(trim($_POST['tel']));
    $user_type = htmlspecialchars(trim($_POST['user_type']));

    // Test if the email is already registered
    $user = new User($db);
    if ($user->emailExists($email)) {
        $errors['email'] = "Email is already registered.";
    }

    // Validate inputs
    if (empty($nom)) {
        $errors['nom'] = "First Name is required.";
    }

    if (empty($prenom)) {
        $errors['prenom'] = "Last Name is required.";
    }

    if (empty($pseudo)) {
        $errors['pseudo'] = "Username is required.";
    }

    if (empty($email)) {
        $errors['email'] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }

    if (empty($password)) {
        $errors['password'] = "Password is required.";
    } elseif (strlen($password) < 8) {
        $errors['password'] = "Password must be at least 8 characters long.";
    } elseif (!preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password)) {
        $errors['password'] = "Password must include at least one uppercase letter, one lowercase letter, and one number.";
    }

    if (empty($date_naissance)) {
        $errors['date_naissance'] = "Birthdate is required.";
    } elseif (!strtotime($date_naissance)) {
        $errors['date_naissance'] = "Invalid date format for Birthdate.";
    }

    if (empty($tel)) {
        $errors['tel'] = "Telephone is required.";
    } elseif (!preg_match('/^\d{10,15}$/', $tel)) {
        $errors['tel'] = "Telephone must be 10 to 15 digits.";
    }

    if (empty($user_type)) {
        $errors['user_type'] = "User type is required.";
    }

    // If no errors, proceed to register the user
    if (empty($errors)) {
        // Hash the password before storing
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Generate a login token
        $login_token = bin2hex(random_bytes(16));

        // Prepare the user data
        $data = [
            'user_type' => $user_type,
            'nom' => $nom,
            'prenom' => $prenom,
            'pseudo' => $pseudo,
            'email' => $email,
            'password' => $hashedPassword,
            'date_naissance' => $date_naissance,
            'consent' => $consent,
            'tel' => $tel,
            'login_token' => $login_token,
        ];

        // Register the user
        $result = $user->register($data);

        if ($result) {
            $success = 'Registration successful. You can now <a href="login.php">log in</a>.';
        } else {
            $errors['general'] = 'Registration failed. Please try again.';
        }
    }
}

require_once 'view/signup.view.php';
?>
