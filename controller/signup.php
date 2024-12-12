<?php
$title = "sign up";

// Include necessary files for database and user controller
require_once 'model/db.php';
require_once 'model/user.php'; 

// Create a new instance of the Database class to establish a connection
$database = new Database();
$db = $database->getConnection(); 

// Initialize error messages and input values
$errors = [];
$name = $email = $password = $nom = $prenom = $pseudo = $date_naissance = $consent = $tel = $user_type = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
    $nom = htmlspecialchars(trim($_POST['nom']));
    $prenom = htmlspecialchars(trim($_POST['prenom']));
    $pseudo = htmlspecialchars(trim($_POST['pseudo']));
    $date_naissance = htmlspecialchars(trim($_POST['date_naissance']));
    $consent = isset($_POST['consent']) ? 1 : 0; // consent is a checkbox that retun true or false
    $tel = htmlspecialchars(trim($_POST['tel']));
    $user_type = htmlspecialchars(trim($_POST['user_type']));

    // test if the email is already registered
    $user = new User($db);
    if ($user->emailExists($email)) {
        $errors[] = "Email is already registered.";
    }

    // Validate inputs
    if (empty($name)) {
        $errors[] = "Name is required.";
    }

    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long.";
    } elseif (!preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password)) {
        $errors[] = "Password must include at least one uppercase letter, one lowercase letter, and one number.";
    }

    if (empty($nom)) {
        $errors[] = "Nom is required.";
    }

    if (empty($prenom)) {
        $errors[] = "Prenom is required.";
    }

    if (empty($pseudo)) {
        $errors[] = "Pseudo is required.";
    }

    if (empty($date_naissance)) {
        $errors[] = "Date de naissance is required.";
    } elseif (!strtotime($date_naissance)) {
        $errors[] = "Invalid date format for Date de naissance.";
    }

    if (empty($tel)) {
        $errors[] = "Telephone is required.";
    } elseif (!preg_match('/^\d{10,15}$/', $tel)) {
        $errors[] = "Telephone must be 10 to 15 digits.";
    }

    if (empty($user_type)) {
        $errors[] = "User type is required.";
    }

    // If no errors, proceed to register the user
    if (empty($errors)) {
        // Hash the password before storing
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Generate a login token
        $login_token = bin2hex(random_bytes(16));

        // Prepare the user data
        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $hashedPassword,
            'nom' => $nom,
            'prenom' => $prenom,
            'pseudo' => $pseudo,
            'date_naissance' => $date_naissance,
            'consent' => $consent,
            'tel' => $tel,
            'user_type' => $user_type,
            'login_token' => $login_token
        ];



        // Register the user
        $user->register($data);


        if ($result === 'User registered successfully') {
            // Registration successful, display a success message
            echo "<p style='color: green;'>Registration successful!</p>";
        } else {
            // Registration failed, display the error message from the UserController
            $errors[] = $result;
        }
    }
}

require_once 'view/signup.view.php';
?>

<!-- Display error messages -->
<?php if (!empty($errors)): ?>
    <div style="color: red;">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>