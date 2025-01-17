<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Admin Dashboard</title>
    <!-- stylesheet -->
    <link rel="stylesheet" href="/aesthetic_gallery/view/css/admindashboard.css">
</head>

<body>
    <div class="sidebar">
        <h2>Admin</h2>
        <ul>
            <li><a href="#" data-section="dashboard">Dashboard</a></li>
            <li><a href="#" data-section="users">Users</a></li>
            <li><a href="#" data-section="reports">Reports</a></li>
            <li><a href="#" data-section="settings">Settings</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="header">
            <h1 id="section-title">Dashboard</h1>
        </div>
        <div class="content" id="content-area">
            <p>Welcome to the Dashboard! Here you can see an overview of the system.</p>
        </div>
    </div>

    <script>
        const contentArea = document.getElementById('content-area');
        const sectionTitle = document.getElementById('section-title');

        document.querySelectorAll('.sidebar ul li a').forEach(link => {
            link.addEventListener('click', (event) => {
                event.preventDefault();

                // Get the section name
                const section = event.target.getAttribute('data-section');

                // Update the title
                sectionTitle.textContent = section.charAt(0).toUpperCase() + section.slice(1);

                // Load content dynamically
                fetch(`/aesthetic_gallery/controller/admin/${section}.php`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.text();
                    })
                    .then(data => {
                        contentArea.innerHTML = data;
                    })
                    .catch(error => {
                        contentArea.innerHTML = `<p>Error loading content: ${error.message}</p>`;
                    });
            });
        });

        async function deleteUser(userId) {
            if (confirm('Are you sure you want to delete this user?')) {
                try {
                    const response = await fetch('/aesthetic_gallery/controller/admin/users.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            Id_user: userId
                        })
                    });

                    const responseText = await response.text(); // Get the response text
                    console.log(responseText); // Log the response text for debugging

                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }

                    const result = JSON.parse(responseText); // Parse the response text as JSON

                    if (result.success) {
                        document.querySelector(`tr[data-user-id="${userId}"]`).remove();
                        document.getElementById('feedbackMessage').innerText = 'User deleted successfully.';
                    } else {
                        document.getElementById('feedbackMessage').innerText = 'Failed to delete user.';
                    }
                } catch (error) {
                    console.error('Error:', error);
                    document.getElementById('feedbackMessage').innerText = 'An error occurred while deleting the user.';
                }
            }
        }
    </script>
</body>

</html>