<!DOCTYPE html>
<html lang="en">

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

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="date"] {
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
            font-family: "Georgia", serif;
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
            <label for="nom">First Name</label>
            <input type="text" id="nom" name="nom" placeholder="Your first name" required>

            <label for="prenom">Last Name</label>
            <input type="text" id="prenom" name="prenom" placeholder="Your last name" required>

            <label for="pseudo">Username</label>
            <input type="text" id="pseudo" name="pseudo" placeholder="Your username" required>

            <label for="date_naissance">Birthdate</label>
            <input type="date" id="date_naissance" name="date_naissance" required>

            <label for="tel">Phone</label>
            <input type="text" id="tel" name="tel" placeholder="Your phone number" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Your email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Create a password" minlength="8" required>

            <label for="user_type">User Type</label>
            <select id="user_type" name="user_type" required>
                <option value="">-- Select a user type --</option>
                <option value="artist">Artist</option>
                <option value="buyer">Buyer</option>
            </select>

            <label for="consent">
                <input type="checkbox" id="consent" name="consent" required> I accept the terms and conditions
            </label>

            <span id="formErrors" class="error"></span>

            <button type="submit">Sign Up</button>
        </form>


        <div class="additional-links">
            <p><a href="#">Forgot your password?</a></p>
            <p>Don't have an account? <a href="#">Sign up</a></p>
            <p>Are you an artist at the current gallery? <a href="#">Log in here</a></p>
        </div>
    </div>
    <script>
        // Function to toggle password visibility
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const passwordIcon = document.getElementById('password-icon');
            const passwordText = document.getElementById('password-text');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.src = 'eye-closed-icon.png';
                passwordText.textContent = 'Hide';
            } else {
                passwordInput.type = 'password';
                passwordIcon.src = 'eye-icon.png';
                passwordText.textContent = 'Show';
            }
        }
    </script>

</body>

</html>