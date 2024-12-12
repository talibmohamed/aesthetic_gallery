<!-- call view -->
<?php
$title = "sign up"; 

// if methode post display the form data 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    echo "Name: $name <br>";
    echo "Email: $email <br>";
    echo "Password: $password <br>";
    
}

require_once 'view/signup.view.php';