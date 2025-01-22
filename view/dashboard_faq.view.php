<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ Management</title>
    <link rel="stylesheet" href="/aesthetic_gallery/view/css/admindashboard.css">
    <link rel="stylesheet" href="/aesthetic_gallery/view/css/faqadmin.css">
</head>

<body>
    <?php require_once 'partial/sidebare_admin.php'; ?>
    <div class="main-content">
        <h2>FAQ Management</h2>

        <!-- Form to Add New FAQ -->
        <h3>Add New FAQ</h3>
        <form id="add-faq-form">
            <label for="question">Question:</label>
            <input type="text" id="question" name="question" required>

            <label for="response">Response:</label>
            <textarea id="response" name="response" required></textarea>

            <button type="submit">Add FAQ</button>
        </form>


        <!-- Table displaying existing FAQs -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Question</th>
                    <th>Response</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="faq-list">
                <?php foreach ($faqList as $faq) : ?>
                    <tr id="faq-<?= $faq['Id_FAQ']; ?>">
                        <td><?= $faq['Id_FAQ']; ?></td>
                        <td contenteditable="true" class="editable-question"><?= htmlspecialchars($faq['questions']); ?></td>
                        <td contenteditable="true" class="editable-response"><?= htmlspecialchars($faq['reponses']); ?></td>
                        <td>
                            <div class="button-container">
                                <button class="save-btn" data-id="<?= $faq['Id_FAQ']; ?>">Save</button>
                                <button class="delete-btn" data-id="<?= $faq['Id_FAQ']; ?>">Delete</button>
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
                const row = document.getElementById(`faq-${id}`);
                const question = row.querySelector('.editable-question').innerText.trim();
                const answer = row.querySelector('.editable-response').innerText.trim();

                if (!question || !answer) {
                    showToast('Question and response cannot be empty.', false);
                    return;
                }

                try {
                    const response = await fetch('/aesthetic_gallery/controller/admin/update_faq.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            id: id,
                            question: question,
                            response: answer
                        })
                    });

                    const data = await response.json();

                    if (data.success) {
                        showToast('FAQ updated successfully.');
                    } else {
                        showToast(data.message || 'An error occurred while updating the FAQ.', false);
                    }
                } catch (error) {
                    console.error('Error:', error);
                    showToast('An error occurred while updating the FAQ.', false);
                }
            });
        });

        // Handle Delete Action
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', async () => {
                const id = button.getAttribute('data-id');
                const row = document.getElementById(`faq-${id}`);

                if (confirm('Are you sure you want to delete this FAQ?')) {
                    try {
                        const response = await fetch('/aesthetic_gallery/controller/admin/delete_faq.php', {
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
                            showToast('FAQ deleted successfully.');
                            row.remove(); // Remove the row from the table
                        } else {
                            showToast(data.message || 'An error occurred while deleting the FAQ.', false);
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        showToast('An error occurred while deleting the FAQ.', false);
                    }
                }
            });
        });

        // Handle Add New FAQ Form Submission
        document.getElementById('add-faq-form').addEventListener('submit', async function(event) {
            event.preventDefault();

            const question = document.getElementById('question').value.trim();
            const responseText = document.getElementById('response').value.trim(); // Renamed variable

            if (!question || !responseText) {
                showToast('Both question and response are required.', false);
                return;
            }

            try {
                const serverResponse = await fetch('/aesthetic_gallery/controller/admin/add_faq.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        question: question,
                        response: responseText
                    })
                });

                const data = await serverResponse.json();

                if (data.success) {
                    showToast('FAQ created successfully.');

                } else {
                    showToast(data.message || 'An error occurred while creating the FAQ.', false);
                }
            } catch (error) {
                console.error('Error:', error);
                showToast('An error occurred while creating the FAQ.', false);
            }
        });
    </script>
</body>

</html>