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
    <div class="form-container">
        <h2 class="form-title">Sign Up hgshsg</h2>
        <form method="POST" class="signup-form">
            <label for="pseudo" class="form-label form-label-italic">Username</label>
            <input type="text" id="pseudo" name="pseudo" class="form-input" placeholder="Your username" required>

            <label for="date_naissance" class="form-label form-label-italic">Birthdate</label>
            <input type="date" id="date_naissance" name="date_naissance" class="form-input" required>

            <label for="tel" class="form-label form-label-italic">Phone</label>
            <input type="text" id="tel" name="tel" class="form-input" placeholder="Your phone number" required>

            <label for="email" class="form-label form-label-italic">Email</label>
            <input type="email" id="email" name="email" class="form-input" placeholder="Your email" required>

            <label for="password" class="form-label form-label-italic">Password</label>
            <input type="password" id="password" name="password" class="form-input" placeholder="Create a password" minlength="8" required>

            <label for="user_type" class="form-label form-label-italic">User Type</label>
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
