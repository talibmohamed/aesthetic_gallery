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

        // Define content for each section
        const content = {
            dashboard: `
            <?php require_once './dashboard_partials/overview.php'; ?> 
            `,
            users: `
                <h2>Manage Users</h2>
                <p>Here you can view, edit, and delete users from the system.</p>
            `,
            reports: `
                <h2>Reports</h2>
                <p>Access detailed reports and analytics about the system's performance.</p>
            `,
            settings: `
                <h2>Settings</h2>
                <p>Manage system settings, preferences, and configurations here.</p>
            `
        };

        // Handle navigation click
        document.querySelectorAll('.sidebar ul li a').forEach(link => {
            link.addEventListener('click', (event) => {
                event.preventDefault(); // Prevent default link behavior

                // Get the section name from the data attribute
                const section = event.target.getAttribute('data-section');

                // Update the content area and title
                sectionTitle.textContent = section.charAt(0).toUpperCase() + section.slice(1);
                contentArea.innerHTML = content[section];
            });
        });
    </script>
</body>

</html>