<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CGU Management</title>
    <link rel="stylesheet" href="/aesthetic_gallery/view/css/admindashboard.css">
    <link rel="stylesheet" href="/aesthetic_gallery/view/css/cguadmin.css">
</head>

<body>
    <?php require_once 'partial/sidebare_admin.php'; ?>
    <div class="main-content">
        <h2>CGU Management</h2>

        <!-- Form to Add New CGU -->
        <h3>Add New CGU</h3>
        <form id="add-cgu-form">
            <label for="condition">Condition:</label>
            <textarea id="condition" name="condition" required></textarea>

            <button type="submit">Add CGU</button>
        </form>

        <!-- Table displaying existing CGUs -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Condition</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="cgu-list">
                <?php foreach ($cguList as $cgu) : ?>
                    <tr id="cgu-<?= $cgu['Id_cgu']; ?>">
                        <td><?= $cgu['Id_cgu']; ?></td>
                        <td contenteditable="true" class="editable-condition"><?= htmlspecialchars($cgu['condition']); ?></td>
                        <td>
                            <div class="button-container">
                                <button class="save-btn" data-id="<?= $cgu['Id_cgu']; ?>">Save</button>
                                <button class="delete-btn" data-id="<?= $cgu['Id_cgu']; ?>">Delete</button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div id="toast-container"></div>

    </div>

    <script>
        // Function to show a toast notification
        function showToast(message, success = true) {
            const toast = document.createElement('div');
            toast.classList.add('toast');
            toast.classList.add(success ? 'success' : 'error');
            toast.innerText = message;
            document.body.appendChild(toast);

            // Make the toast visible and fade it out after a short time
            setTimeout(() => {
                toast.classList.add('show');
            }, 100);

            setTimeout(() => {
                toast.classList.remove('show');
                setTimeout(() => {
                    toast.remove();
                }, 500);
            }, 3000);
        }

        // Handle Edit (Save) Action
        document.querySelectorAll('.save-btn').forEach(button => {
            button.addEventListener('click', async () => {
                const id = button.getAttribute('data-id');
                const row = document.getElementById(`cgu-${id}`);
                const condition = row.querySelector('.editable-condition').innerText.trim();

                if (!condition) {
                    showToast('Condition cannot be empty.', false);
                    return;
                }

                try {
                    const response = await fetch('/aesthetic_gallery/controller/admin/update_cgu.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            id: id,
                            condition: condition
                        })
                    });

                    // Log the response for debugging
                    const text = await response.text(); // Get the response as text
                    console.log(text); // Log the response text

                    const data = JSON.parse(text); // Parse the text as JSON

                    if (data.success) {
                        showToast('CGU updated successfully.');
                    } else {
                        showToast(data.message || 'An error occurred while updating the CGU.', false);
                    }
                } catch (error) {
                    console.error('Error:', error);
                    showToast('An error occurred while updating the CGU.', false);
                }
            });
        });

        // Handle Delete Action
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', async () => {
                const id = button.getAttribute('data-id');
                const row = document.getElementById(`cgu-${id}`);

                if (confirm('Are you sure you want to delete this CGU?')) {
                    try {
                        const response = await fetch('/aesthetic_gallery/controller/admin/delete_cgu.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                id: id
                            })
                        });

                        const data = await response.json();

                        if (data.success) {
                            showToast('CGU deleted successfully.');
                            row.remove(); // Remove the row from the table
                        } else {
                            showToast(data.message || 'An error occurred while deleting the CGU.', false);
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        showToast('An error occurred while deleting the CGU11.', false);
                    }
                }
            });
        });

        // Handle Add New CGU Form Submission
        document.getElementById('add-cgu-form').addEventListener('submit', async function(event) {
            event.preventDefault();

            const condition = document.getElementById('condition').value.trim();

            if (!condition) {
                showToast('Condition is required.', false);
                return;
            }

            try {
                const response = await fetch('/aesthetic_gallery/controller/admin/add_cgu.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        condition: condition
                    })
                });

                const data = await response.json();

                if (data.success) {
                    showToast('CGU created successfully.');
                    location.reload(); // Reload the page to reflect the changes
                } else {
                    showToast(data.message || 'An error occurred while creating the CGU.', false);
                }
            } catch (error) {
                console.error('Error:', error);
                showToast('An error occurred while creating the CGU.', false);
            }
        });
    </script>
</body>

</html>