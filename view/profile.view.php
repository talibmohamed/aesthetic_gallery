<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="/aesthetic_gallery/view/css/profile.css">
    <style>
    .popover-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    .popover {
        background: #FFF9F6;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        width: 500px;
        max-width: 90%;
        position: relative;
        font-family: 'KoPub Batang', sans-serif;
    }

    .popover h2 {
        font-family: Poppins, sans-serif;
        font-size: 2em;
        color: #423E31;
        margin: 0 0 20px;
        text-align: center;
    }

    .popover .close-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        background: none;
        border: none;
        font-size: 20px;
        color: #423E31;
        cursor: pointer;
    }

    .popover .close-btn:hover {
        color: #c3bfbd;
    }

    .popover form .form-group {
        margin-bottom: 20px;
    }

    .popover form .form-group label {
        font-family: Poppins, sans-serif;
        font-size: 0.9em;
        color: #666666;
        display: block;
        margin-bottom: 8px;
    }

    .popover form .form-group input,
    .popover form .form-group select {
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        background-color: #FFF9F6;
        border: 1px solid #ccc;
        border-radius: 15px;
        box-sizing: border-box;
        font-family: Poppins, sans-serif;
    }

    .popover form .form-button {
        font-family: Poppins, sans-serif;
        padding: 15px;
        background-color: #c3bfbd;
        color: white;
        width: 100%;
        border-radius: 27px;
        border: none;
        font-size: 1em;
        cursor: pointer;
        margin-top: 20px;
    }

    .popover form .form-button:hover {
        background-color: #423E31;
        transition: background-color 0.5s;
    }

    /* Error message styles */
    .error-message {
        color: red;
        font-size: 0.9em;
        margin-top: 10px;
    }

    #availability-status {
        font-size: 0.9em;
        margin-left: 10px;
    }
    </style>
</head>

<body>
    <?php require_once 'partial/header.php'; ?>

    <div class="main-container">
        <div class="form-container">
            <h1 class="form-title">User Profile</h1>
            
            <!-- Displaying any backend error messages -->
            <?php if (!empty($errorMessages)): ?>
                <div class="error-message">
                    <ul>
                        <?php foreach ($errorMessages as $error): ?>
                            <li><?php echo htmlspecialchars($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <!-- Displaying success message -->
            <?php if (isset($successMessage)): ?>
                <div class="success-message" style="color: green; font-size: 1em;">
                    <?php echo htmlspecialchars($successMessage); ?>
                </div>
            <?php endif; ?>

            <div class="profile-info">
                <div class="profile-item">
                    <span class="form-label">User Type:</span>
                    <span class="form-input"><?php echo htmlspecialchars($userDetails['user_type']); ?></span>
                </div>
                <div class="profile-item">
                    <span class="form-label">Nom:</span>
                    <span class="form-input"><?php echo htmlspecialchars($userDetails['nom']); ?></span>
                </div>
                <div class="profile-item">
                    <span class="form-label">Prénom:</span>
                    <span class="form-input"><?php echo htmlspecialchars($userDetails['Prenom']); ?></span>
                </div>
                <div class="profile-item">
                    <span class="form-label">Pseudo:</span>
                    <span class="form-input"><?php echo htmlspecialchars($userDetails['Pseudo']); ?></span>
                </div>
                <div class="profile-item">
                    <span class="form-label">Email:</span>
                    <span class="form-input"><?php echo htmlspecialchars($userDetails['Email']); ?></span>
                </div>
                <div class="profile-item">
                    <span class="form-label">Date de Naissance:</span>
                    <span class="form-input"><?php echo htmlspecialchars($userDetails['date_naissance'] ?: 'N/A'); ?></span>
                </div>
                <div class="profile-item">
                    <span class="form-label">Téléphone:</span>
                    <span class="form-input"><?php echo htmlspecialchars($userDetails['tel'] ?: 'N/A'); ?></span>
                </div>
                <div class="profile-item">
                    <span class="form-label">Date de Création:</span>
                    <span class="form-input"><?php echo htmlspecialchars($userDetails['date_creation']); ?></span>
                </div>
            </div>
            <button id="editProfileBtn" class="form-button">Edit Profile</button>
        </div>
    </div>

    <!-- Popover for editing profile -->
    <div class="popover-overlay" id="popoverOverlay">
        <div class="popover">
            <button class="close-btn" id="closePopoverBtn">&times;</button>
            <h2>Edit Profile</h2>
            <form id="editProfileForm" action="" method="POST">
                <div class="form-group">
                    <label for="nom">Nom:</label>
                    <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($userDetails['nom']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="Prenom">Prénom:</label>
                    <input type="text" id="Prenom" name="Prenom" value="<?php echo htmlspecialchars($userDetails['Prenom']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="pseudo">Pseudo:</label>
                    <input type="text" id="pseudo" name="Pseudo" value="<?php echo htmlspecialchars($userDetails['Pseudo']); ?>" required>
                    <span id="availability-status" style="font-size: 0.9em; margin-left: 10px;"></span>
                </div>

                <div class="form-group">
                    <label for="Email">Email:</label>
                    <input type="email" id="Email" name="Email" value="<?php echo htmlspecialchars($userDetails['Email']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="date_naissance">Date de Naissance:</label>
                    <input type="date" id="date_naissance" name="date_naissance" value="<?php echo htmlspecialchars($userDetails['date_naissance']); ?>">
                </div>
                <div class="form-group">
                    <label for="tel">Téléphone:</label>
                    <input type="tel" id="tel" name="tel" value="<?php echo htmlspecialchars($userDetails['tel']); ?>">
                </div>
                <button type="submit" class="form-button">Save Changes</button>
            </form>
        </div>
    </div>

    <script>
        // JavaScript for toggling the popover
        const editProfileBtn = document.getElementById('editProfileBtn');
        const popoverOverlay = document.getElementById('popoverOverlay');
        const closePopoverBtn = document.getElementById('closePopoverBtn');

        editProfileBtn.addEventListener('click', () => {
            popoverOverlay.style.display = 'flex';
        });

        closePopoverBtn.addEventListener('click', () => {
            popoverOverlay.style.display = 'none';
        });

        // Close popover when clicking outside
        popoverOverlay.addEventListener('click', (e) => {
            if (e.target === popoverOverlay) {
                popoverOverlay.style.display = 'none';
            }
        });

        let debounceTimer;

        // Store the current pseudo in a variable
        const currentPseudo = '<?php echo htmlspecialchars($userDetails['Pseudo']); ?>';

        function checkpseudoAvailability() {
            const pseudo = document.getElementById('pseudo').value;

            // Check if pseudo is not empty
            if (pseudo.trim() === '') {
                return;
            }

            // Check if the pseudo is the same as the current pseudo
            if (pseudo === currentPseudo) {
                const status = document.getElementById('availability-status');
                status.textContent = 'This is your current pseudo.';
                status.style.color = 'blue';
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
                            status.textContent = 'Pseudo is available! ✔';
                            status.style.color = 'green';
                        } else if (data.available === false) {
                            status.textContent = 'Pseudo is already taken. ✘';
                            status.style.color = 'red';
                        }
                    })
                    .catch(error => console.error('Error checking pseudo availability:', error));
            }
        }

        document.getElementById('pseudo').addEventListener('input', () => {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(checkpseudoAvailability, 300);
        });
    </script>
</body>

</html>
