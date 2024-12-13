<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Lien vers le fichier CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Customer Login</h2>

    <form>
        <!-- Email -->
        <label for="email">Email address or user name:</label><br>
        <input type="text" id="email" name="email" placeholder="Enter your email"><br>

        <!-- Password -->
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" placeholder="Enter your password"><br>

        <!-- Button -->
        <button type="submit">Log in</button>
    </form>

    <!-- Links -->
    <p><a href="#">Forgot your password?</a></p>
    <p>Don't have an account? <a href="#">Sign up</a></p>
    <p>Are you a gallery artist? <a href="#">Log in here</a></p>
</body>
</html>
