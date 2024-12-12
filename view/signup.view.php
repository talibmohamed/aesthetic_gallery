<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .signup-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h2 {
            text-align: center;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: purple;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }

        .italic {
            font-style: italic;
            font-family: "Georgia", serif; /* Exemple d'une autre police */
        }
    </style>
</head>
<body>

    <div class="signup-form">
        <h2>Sign Up</h2>
        <form method="POST">
            <label for="name">Nom complet</label>
            <input type="text" id="name" name="name" placeholder="Votre nom complet" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Votre email" required>

            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" placeholder="Créer un mot de passe" required>

            <button type="submit">S'inscrire</button>
        </form>

        <div class="additional-links">
            <p><a href="#">Forget your password</a></p>
            <p>Don't have an account? <a href="#">Sign up</a></p>
            <p>Are you a current aesthetic gallery artist? <a href="#">Log in here</a></p>
                <img id="password-icon" src="eye-icon.png" alt="Voir" />
                <span id="password-text">Hide</span>
        </div>
    </div>
    <script>
        // Fonction pour afficher ou masquer le mot de passe
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const passwordIcon = document.getElementById('password-icon');
            const passwordText = document.getElementById('password-text');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text'; // Affiche le mot de passe
                passwordIcon.src = 'eye-closed-icon.png'; // Change l'icône
                passwordText.textContent = 'Hide'; // Change le texte en "Hide"
            } else {
                passwordInput.type = 'password'; // Cache le mot de passe
                passwordIcon.src = 'eye-icon.png'; // Change l'icône
                passwordText.textContent = 'Show'; // Change le texte en "Show"
            }
        }
    </script>

</body>
</html>
