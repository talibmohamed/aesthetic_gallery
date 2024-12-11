<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fefaf7; /* Couleur de fond */
            color: #5f4637; /* Couleur du texte */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            width: 100%;
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: normal;
        }

        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .show-password {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        button {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #e0ddd8;
            border: none;
            border-radius: 5px;
            color: #5f4637;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #d4d1cb;
        }

        a {
            color: #5f4637;
            text-decoration: none;
            font-size: 14px;
        }

        a:hover {
            text-decoration: underline;
        }

        p {
            margin: 10px 0;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Customer Login</h2>
        <form action="/login" method="POST">
            <!-- Champ Email -->
            <label for="email">Email address or user name:</label>
            <input type="email" id="email" name="email" placeholder="Email address or user name" required>

            <!-- Champ Password -->
            <label for="password">Password:</label>
            <div class="show-password">
                <input type="password" id="password" name="password" placeholder="Password" required>
                <button type="button" onclick="togglePassword()">👁️</button>
            </div>

            <!-- Termes et conditions -->
            <p>By continuing, you agree to the <a href="#">Terms of use</a> and <a href="#">Privacy Policy</a>.</p>

            <!-- Bouton de connexion -->
            <button type="submit">Log in</button>

            <!-- Liens supplémentaires -->
            <p><a href="#">Forgot your password?</a></p>
            <p>Don't have an account? <a href="#">Sign up</a></p>
            <p>Are you a current aesthetic gallery artist? <a href="#">Log in here</a></p>
        </form>
    </div>

    <script>
        // Fonction pour afficher/masquer le mot de passe
        function togglePassword() {
            const passwordField = document.getElementById('password');
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }
    </script>
</body>
</html>
