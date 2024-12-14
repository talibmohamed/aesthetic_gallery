<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="/aesthetic_gallery/view/css/signup.css">
</head>

<body>
    <div class="form-container">
        <h2 class="form-title">Sign Up hgshsg</h2>
        <form method="POST" class="signup-form">
            <label for="nom" class="form-label">First Name</label>
            <input type="text" id="nom" name="nom" class="form-input" placeholder="Your first name" required>

            <label for="prenom" class="form-label">Last Name</label>
            <input type="text" id="prenom" name="prenom" class="form-input" placeholder="Your last name" required>

            <label for="pseudo" class="form-label">Username</label>
            <input type="text" id="pseudo" name="pseudo" class="form-input" placeholder="Your username" required>

            <label for="date_naissance" class="form-label">Birthdate</label>
            <input type="date" id="date_naissance" name="date_naissance" class="form-input" required>

            <label for="tel" class="form-label">Phone</label>
            <input type="text" id="tel" name="tel" class="form-input" placeholder="Your phone number" required>

            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-input" placeholder="Your email" required>

            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-input" placeholder="Create a password" minlength="8" required>

            <label for="user_type" class="form-label">User Type</label>
            <select id="user_type" name="user_type" class="form-select" required>
                <option value="">-- Select a user type --</option>
                <option value="artist">Artist</option>
                <option value="buyer">Buyer</option>
            </select>

            <label for="consent" class="form-consent">
                <input type="checkbox" id="consent" name="consent" required> I accept the terms and conditions
            </label>

            <span id="formErrors" class="form-error"></span>

            <button type="submit" class="form-button">Sign Up</button>
        </form>


        <form class="form-container">
            <label class="form-label">Username</label>
            <input type="text" class="form-input" placeholder="Your username">

            <label class="form-label">Birthdate</label>
            <input type="date" class="form-input">

            <label class="form-label">Phone</label>
            <input type="tel" class="form-input" placeholder="Your phone number">

            <label class="form-label">Email</label>
            <input type="email" class="form-input" placeholder="Your email">

            <label class="form-label">Password</label>
            <input type="password" class="form-input" placeholder="Create a password">

            <label class="form-label">User Type</label>
            <select class="form-input">
                <option>-- Select a user type --</option>
                <option>User</option>
                <option>Admin</option>
            </select>

            <div class="form-terms">
                <input type="checkbox" id="terms" class="form-checkbox">
                <label for="terms" class="form-label">I accept the terms and conditions</label>
            </div>
        </form>
        

        <div class="additional-links">
            <p><a href="#" class="link">Forgot your password?</a></p>
            <p>Don't have an account? <a href="#" class="link">Sign up</a></p>
            <p>Are you an artist at the current gallery? <a href="#" class="link">Log in here</a></p>
        </div>

        <div class="captcha-container">
            <div class="captcha-box">I'm not a robot</div>
            <span class="captcha-logo">reCAPTCHA</span>
        </div>
    </div>
</body>

</html>
