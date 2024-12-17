<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="body">
    <div class="login-container">
        <h1 class="login-title">Login</h1>
        <form class="login-form">
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" class="form-input" placeholder="Enter your email">
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" class="form-input" placeholder="Enter your password">
            </div>

            <div class="form-options">
                <label class="checkbox-label">
                    <input type="checkbox" class="form-checkbox"> Remember me
                </label>
                <a href="#" class="link">Forgot password?</a>
            </div>

            <button type="submit" class="login-button">Log in</button>
        </form>
        <p class="signup-text">
            Don't have an account? <a href="#" class="link">Sign up</a>
        </p>
    </div>
</body>
</html>
