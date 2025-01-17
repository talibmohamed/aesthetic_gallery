<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Users</title>
    <link rel="stylesheet" href="../../view/css/style.css">
</head>

<body>
    <div class="main-container">
        <h2>Users</h2>

        <!-- Feedback message area -->
        <div id="feedbackMessage" style="margin-bottom: 10px;"></div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- User rows will be dynamically added here -->
                <?php
                // Assuming $users is an array of user data fetched from a database
                foreach ($users as $user): ?>
                    <tr class="user-row" data-user-id="<?= htmlspecialchars($user['Id_user']) ?>">
                        <td><?= htmlspecialchars($user['Id_user']) ?></td>
                        <td><?= htmlspecialchars($user['nom']) ?> <?= htmlspecialchars($user['Prenom']) ?></td>
                        <td><?= htmlspecialchars($user['Pseudo']) ?></td>
                        <td><?= htmlspecialchars($user['Email']) ?></td>
                        <td><?= htmlspecialchars(ucfirst($user['user_type'])) ?></td>
                        <td>
                            <button type="button" class="delete-btn" onclick="deleteUser(<?= htmlspecialchars($user['Id_user']) ?>);">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script>
        async function deleteUser(userId) {
            if (confirm('Are you sure you want to delete this user?')) {
                try {
                    const response = await fetch('/aesthetic_gallery/controller/admin/users.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ Id_user: userId })
                    });
                    const result = await response.json();
                    if (result.success) {
                        document.querySelector(`tr[data-user-id="${userId}"]`).remove();
                        alert('User deleted successfully.');
                    } else {
                        alert('Failed to delete user.');
                    }
                } catch (error) {
                    console.error('Error:', error);
                    alert('An error occurred while deleting the user.');
                }
            }
        }
    </script>
</body>

</html>
