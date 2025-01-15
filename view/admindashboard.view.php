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
                fetch(`/aesthetic_gallery/controller/${section}.php`)
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
    </script>
</body>

</html>
