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
            <form method="POST" class="signup-form" id="signup-form">
                <label for="pseudo" class="form-label">Username</label>
                <input type="text" id="pseudo" name="pseudo" class="form-input" placeholder="Your username" required>
                <span id="availability-status" class="availability-status"></span>
                <?php if (isset($errors['pseudo'])): ?>
                    <span class="form-error"><?php echo htmlspecialchars($errors['pseudo']); ?></span>
                <?php endif; ?>

                <label for="nom" class="form-label">First Name</label>
                <input type="text" id="nom" name="nom" class="form-input" placeholder="Your first name" required>
                <?php if (isset($errors['nom'])): ?>
                    <span class="form-error"><?php echo htmlspecialchars($errors['nom']); ?></span>
                <?php endif; ?>

                <label for="prenom" class="form-label">Last Name</label>
                <input type="text" id="prenom" name="prenom" class="form-input" placeholder="Your last name" required>
                <?php if (isset($errors['prenom'])): ?>
                    <span class="form-error"><?php echo htmlspecialchars($errors['prenom']); ?></span>
                <?php endif; ?>

                <label for="date_naissance" class="form-label">Birthdate</label>
                <input type="date" id="date_naissance" name="date_naissance" class="form-input" required>
                <?php if (isset($errors['date_naissance'])): ?>
                    <span class="form-error"><?php echo htmlspecialchars($errors['date_naissance']); ?></span>
                <?php endif; ?>

                <label for="tel" class="form-label">Phone</label>
                <input type="text" id="tel" name="tel" class="form-input" placeholder="Your phone number" required>
                <?php if (isset($errors['tel'])): ?>
                    <span class="form-error"><?php echo htmlspecialchars($errors['tel']); ?></span>
                <?php endif; ?>

                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-input" placeholder="Your email" required>
                <?php if (isset($errors['email'])): ?>
                    <span class="form-error"><?php echo htmlspecialchars($errors['email']); ?></span>
                <?php endif; ?>

                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-input" placeholder="Create a password" minlength="8" required>
                <?php if (isset($errors['password'])): ?>
                    <span class="form-error"><?php echo htmlspecialchars($errors['password']); ?></span>
                <?php endif; ?>

                <label for="user_type" class="form-label">User Type</label>
                <div class="form-check form-radio">
                    <input type="radio" id="artist" name="user_type" value="artist" class="form-check-input" required>
                    <label for="artist" class="form-check-label">Artist</label>
                </div>
                <div class="form-check form-radio">
                    <input type="radio" id="buyer" name="user_type" value="buyer" class="form-check-input" required>
                    <label for="buyer" class="form-check-label">Buyer</label>
                </div>
                <?php if (isset($errors['user_type'])): ?>
                    <span class="form-error"><?php echo htmlspecialchars($errors['user_type']); ?></span>
                <?php endif; ?>

                <label for="consent" class="form-consent">
                    <input type="checkbox" id="consent" required> I agree to the <a href="terms" class="link"> Terms of Service</a>
                </label>
                <?php if (isset($errors['consent'])): ?>
                    <span class="form-error"><?php echo htmlspecialchars($errors['consent']); ?></span>
                <?php endif; ?>

                <div class="form-advertising">
                    <input type="checkbox" id="advertising" name="consent" checked> I want to receive exclusive offers and promotions from Aesthetic Gallery
                </div>

                <span id="formErrors" class="form-error"></span>

                <button type="submit" class="form-button">Sign Up</button>

                <!-- if success -->
                <?php if (isset($success)): ?>
                    <span class="form-success"><?php echo htmlspecialchars($success); ?></span>
                <?php endif; ?>

                <!-- is error general -->


            </form>

            <div class="additional-links">
                <p><a href="#" class="link">Forgot your password?</a></p>
                <p>already have an account? <a href="login" class="link">Log in</a></p>
            </div>

        </div>
    </div>

    <?php require_once 'partial/footer.php'; ?>

    <script>
        let debounceTimer;

        function checkpseudoAvailability() {
            const pseudo = document.getElementById('pseudo').value;

            // check if pseudo is not empty
            if (pseudo.trim() === '') {
                return;
            }

            if (pseudo) {
                fetch('/aesthetic_gallery/controller/check_availability.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            pseudo: pseudo
                        })
                    })
                    .then(response => response.json()) // Parse the response as JSON
                    .then(data => {

                        const status = document.getElementById('availability-status');

                        if (data.available === true) {
                            // with unicode 
                            status.textContent = 'pseudo is available! \u2714;';
                            status.style.color = 'green';
                        } else if (data.available === false) {
                            status.textContent = 'pseudo is already taken. \u2718;';
                            status.style.color = 'red';
                        } else {
                            status.textContent = 'An error occurred. Please try again.';
                            status.style.color = 'orange';
                        }
                    })
                    .catch(error => {
                        const status = document.getElementById('availability-status');
                        status.textContent = 'Network error. Please try again.';
                        status.style.color = 'red';
                    });
            } else {
                alert('Please enter a pseudo.');
            }
        }

        document.getElementById('pseudo').addEventListener('input', function() {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(checkpseudoAvailability, 500); // Debounce to prevent multiple requests
        });
    </script>



</body>

</html>