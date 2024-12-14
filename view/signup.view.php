<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="/aesthetic_gallery/view/css/signup.css">
</head>

<body>
    <?php require_once 'partial/header.php'; ?>
    <div class="main-container">
        <div class="form-container">
            <h2 class="form-title">Create customer account</h2>
            <form method="POST" class="signup-form">
                <label for="pseudo" class="form-label">Username</label>
                <input type="text" id="pseudo" name="pseudo" class="form-input" placeholder="Your username" required>

                <label for="nom" class="form-label">First Name</label>
                <input type="text" id="nom" name="nom" class="form-input" placeholder="Your first name" required>

                <label for="prenom" class="form-label">Last Name</label>
                <input type="text" id="prenom" name="prenom" class="form-input" placeholder="Your last name" required>


                <label for="date_naissance" class="form-label">Birthdate</label>
                <input type="date" id="date_naissance" name="date_naissance" class="form-input" required>

                <label for="tel" class="form-label">Phone</label>
                <input type="text" id="tel" name="tel" class="form-input" placeholder="Your phone number" required>

                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-input" placeholder="Your email" required>

                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-input" placeholder="Create a password" minlength="8" required>

                <label for="user_type" class="form-label">User Type</label>
                <div class="form-check form-radio">
                    <input type="radio" id="artist" name="user_type" value="artist" class="form-check-input" required>
                    <label for="artist" class="form-check-label">Artist</label>
                </div>
                <div class="form-check form-radio">
                    <input type="radio" id="buyer" name="user_type" value="buyer" class="form-check-input" required>
                    <label for="buyer" class="form-check-label">Buyer</label>
                </div>

                <label for="consent" class="form-consent">
                    <input type="checkbox" id="consent" required> I agree to the <a href="#" class="link"> Terms of Service</a> and <a href="#" class="link"> Privacy Policy</a>
                </label>

                <!-- adventizing with data -->
                <div class="form-advertising">
                    <input type="checkbox" id="advertising" name="consent" checked> I want to receive exclusive offers and promotions from Aesthetic Gallery
                </div>

                <span id="formErrors" class="form-error"></span>

                <button type="submit" class="form-button">Sign Up</button>
            </form>

            <div class="additional-links">
                <p><a href="#" class="link">Forgot your password?</a></p>
                <p>already have an account? <a href="login.php" class="link">Log in</a></p>
            </div>

        </div>
    </div>

    <?php require_once 'partial/footer.php'; ?>
</body>

</html>