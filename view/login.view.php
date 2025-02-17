<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/aesthetic_gallery/view/css/login.css">

    <!-- Add Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <?php require_once 'partial/header.php'; ?>

    <div class="main-container">
        <div class="form-container">
            <h2 class="form-title">Log In</h2>
            <form method="POST" class="login-form">
                <label for="username_or_email" class="form-label">Username or Email</label>
                <input type="text" id="username_or_email" name="username_or_email" class="form-input" placeholder="Enter your username or email" required>

                <label for="password" class="form-label">Password</label>
                <div class="password-container">
                    <input type="password" id="password" name="password" class="form-input" placeholder="Enter your password" required>
                    <button type="button" id="togglePassword" class="password-toggle-button">
                        <i class="fas fa-eye"></i> 
                    </button>
                </div>

                <?php if (isset($errors['login'])): ?>
                    <span class="form-error"><?php echo htmlspecialchars($errors['login']); ?></span>
                <?php endif; ?>

                <div class="form-options">
                    <label class="checkbox-label">
                        <input type="checkbox" class="form-checkbox"> Remember me
                    </label>
                    <a href="#" class="link">Forgot password?</a>
                </div>

                <button type="submit" class="form-button">Log In</button>

                <?php if (isset($success)): ?>
                    <span class="form-success"><?php echo htmlspecialchars($success); ?></span>
                <?php endif; ?>
            </form>

            <div class="additional-links">
                <p>Don't have an account? <a href="signup" class="link">Sign Up</a></p>
            </div>
        </div>
    </div>

    <?php require_once 'partial/footer.php'; ?>

    <script>
        const passwordField = document.getElementById('password');
        const togglePasswordButton = document.getElementById('togglePassword');
        const passwordIcon = togglePasswordButton.querySelector('i');

        togglePasswordButton.addEventListener('click', function() {
            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;
            if (type === 'password') {
                passwordIcon.classList.remove('fa-eye-slash');
                passwordIcon.classList.add('fa-eye');
            } else {
                passwordIcon.classList.remove('fa-eye');
                passwordIcon.classList.add('fa-eye-slash');
            }
        });
    </script>

</body>

</html>