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
        input[type="text"], input[type="email"], input[type="password"], input[type="date"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        select {
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

        .error {
            color: red;
            font-size: 0.9em;
        }
    </style>
</head>
<body>

    <div class="signup-form">
        <h2>Sign Up</h2>
        <form method="POST" id="signupForm">

            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" placeholder="Votre nom" required>

            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" placeholder="Votre prénom" required>

            <label for="pseudo">Pseudo</label>
            <input type="text" id="pseudo" name="pseudo" placeholder="Votre pseudo" required>

            <label for="date_naissance">Date de naissance</label>
            <input type="date" id="date_naissance" name="date_naissance" required>

            <label for="tel">Téléphone</label>
            <input type="text" id="tel" name="tel" placeholder="Votre numéro de téléphone" pattern="\\d{10}" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Votre email" required>

            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" placeholder="Créer un mot de passe" minlength="8" required>

            <label for="user_type">Type d'utilisateur</label>
            <select id="user_type" name="user_type" required>
                <option value="">-- Sélectionnez un type --</option> <!-- artiste or buyer -->
                <option value="artiste">Artiste</option>
                <option value="buyer">Acheteur</option>
            </select>

            <label for="consent">
                <input type="checkbox" id="consent" name="consent" required> J'accepte les termes et conditions
            </label>

            <span id="formErrors" class="error"></span>

            <button type="submit">S'inscrire</button>
        </form>

        <div class="additional-links">
            <p><a href="#">Forget your password</a></p>
            <p>Don't have an account? <a href="#">Sign up</a></p>
            <p>Are you a current aesthetic gallery artist? <a href="#">Log in here</a></p>
        </div>
    </div>
    <script>
        document.getElementById('signupForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent default form submission

            let errors = [];
            const telInput = document.getElementById('tel');
            const passwordInput = document.getElementById('password');
            const formErrors = document.getElementById('formErrors');

            // Clear previous errors
            formErrors.textContent = '';

            // Validate phone number
            if (!/\\d{10}/.test(telInput.value)) {
                errors.push('Le numéro de téléphone doit contenir exactement 10 chiffres.');
            }

            // Validate password length
            if (passwordInput.value.length < 8) {
                errors.push('Le mot de passe doit comporter au moins 8 caractères.');
            }

            // Display errors or submit the form
            if (errors.length > 0) {
                formErrors.textContent = errors.join(' ');
            } else {
                this.submit();
            }
        });
    </script>

</body>
</html>
