<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Customer Account</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <h1 class="form-title">Create customer account</h1>
        <form class="registration-form">
            <!-- User Name -->
            <div class="form-group">
                <label for="username" class="form-label">user name</label>
                <input type="text" id="username" class="form-input" placeholder="Enter your profile name">
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" class="form-input" placeholder="Enter your email address">
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <div class="password-container">
                    <input type="password" id="password" class="form-input" placeholder="Enter your password">
                    <span class="toggle-password">Hide</span>
                </div>
                <p class="password-info">Use 8 or more characters with a mix of letters, numbers & symbols</p>
            </div>

            <!-- Gender -->
            <div class="form-group">
                <p class="form-label">What's your gender? <span class="optional">(optional)</span></p>
                <div class="form-radio-group">
                    <label class="form-radio">
                        <input type="radio" name="gender" value="female"> Female
                    </label>
                    <label class="form-radio">
                        <input type="radio" name="gender" value="male"> Male
                    </label>
                </div>
            </div>

            <!-- Date of Birth -->
            <div class="form-group">
                <label class="form-label">What's your date of birth?</label>
                <div class="dob-container">
                    <select class="form-select">
                        <option>Month</option>
                    </select>
                    <select class="form-select">
                        <option>Date</option>
                    </select>
                    <select class="form-select">
                        <option>Year</option>
                    </select>
                </div>
            </div>

            <!-- Marketing Checkbox -->
            <div class="form-group">
                <label class="form-checkbox">
                    <input type="checkbox"> Share my registration data with our content providers for marketing purposes.
                </label>
            </div>

            <!-- Terms -->
            <p class="terms">
                By creating an account, you agree to the 
                <a href="#" class="link">Terms of use</a> and 
                <a href="#" class="link">Privacy Policy</a>.
            </p>

            <!-- Recaptcha -->
            <div class="recaptcha-container">
                <input type="checkbox" id="recaptcha">
                <label for="recaptcha">I'm not a robot</label>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="form-button">Sign up</button>

            <!-- Login Link -->
            <p class="login-link">
                Already have an account? <a href="#" class="link">Log in</a>
            </p>
        </form>
    </div>
</body>
</html>
