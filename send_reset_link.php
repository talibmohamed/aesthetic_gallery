<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Inclure PHPMailer
require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer et nettoyer l'adresse e-mail
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Vérifier si l'e-mail est valide
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Initialiser PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Configurer le SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'aestheticgalery0@gmail.com'; // Ton email
            $mail->Password = 'Isep2025.'; // Ton mot de passe
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Destinataire et expéditeur
            $mail->setFrom('aestheticgalery0@gmail.com', 'Your Website'); // Expéditeur
            $mail->addAddress($email); // Destinataire

            // Contenu de l'e-mail
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Request';
            $mail->Body = "
                <p>Hello,</p>
                <p>You requested a password reset. Click the link below to reset your password:</p>
                <p><a href='https://yourwebsite.com/reset_password?email=" . urlencode($email) . "'>Reset Your Password</a></p>
                <p>If you did not request this, please ignore this email.</p>
            ";
            $mail->AltBody = "Hello,\n\nYou requested a password reset. Click the link below to reset your password:\n\nhttps://yourwebsite.com/reset_password?email=" . urlencode($email) . "\n\nIf you did not request this, please ignore this email.";

            // Envoyer l'e-mail
            $mail->send();

            // Afficher le message de succès
            echo "
            <div style='font-family: Arial, sans-serif; text-align: center; margin-top: 50px;'>
                <h1>Password Reset Link Sent</h1>
                <p>A password reset link has been sent to <strong>" . htmlspecialchars($email) . "</strong>.</p>
                <p>Please check your inbox to reset your password.</p>
                <a href='forgot_password.html' style='color: #8c8c8c;'>Go back</a>
            </div>";
        } catch (Exception $e) {
            // Afficher un message d'erreur si l'envoi échoue
            echo "
            <div style='font-family: Arial, sans-serif; text-align: center; margin-top: 50px;'>
                <h1>Error Sending Email</h1>
                <p>Mailer Error: " . $mail->ErrorInfo . "</p>
                <a href='forgot_password.html' style='color: #8c8c8c;'>Go back</a>
            </div>";
        }
    } else {
        // Afficher un message pour un e-mail invalide
        echo "
        <div style='font-family: Arial, sans-serif; text-align: center; margin-top: 50px;'>
            <h1>Invalid Email</h1>
            <p>The email address you entered is not valid.</p>
            <a href='forgot_password.html' style='color: #8c8c8c;'>Go back</a>
        </div>";
    }
} else {
    // Afficher un message pour un accès direct au fichier
    echo "
    <div style='font-family: Arial, sans-serif; text-align: center; margin-top: 50px;'>
        <h1>Unauthorized Access</h1>
        <p>You cannot access this page directly.</p>
        <a href='forgot_password.html' style='color: #8c8c8c;'>Go back</a>
    </div>";
}
?>
