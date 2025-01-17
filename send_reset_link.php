<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

   
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
       
        echo "
        <div style='font-family: Arial, sans-serif; text-align: center; margin-top: 50px;'>
            <h1>Password Reset Link Sent</h1>
            <p>A password reset link has been sent to <strong>" . htmlspecialchars($email) . "</strong>.</p>
            <p>Please check your inbox to reset your password.</p>
            <a href='forgot_password.html' style='color: #8c8c8c;'>Go back</a>
        </div>";
    } else {
        
        echo "
        <div style='font-family: Arial, sans-serif; text-align: center; margin-top: 50px;'>
            <h1>Invalid Email</h1>
            <p>The email address you entered is not valid.</p>
            <a href='forgot_password.html' style='color: #8c8c8c;'>Go back</a>
        </div>";
    }
} else {
    
    echo "
    <div style='font-family: Arial, sans-serif; text-align: center; margin-top: 50px;'>
        <h1>Unauthorized Access</h1>
        <p>You cannot access this page directly.</p>
        <a href='forgot_password.html' style='color: #8c8c8c;'>Go back</a>
    </div>";
}
?>
