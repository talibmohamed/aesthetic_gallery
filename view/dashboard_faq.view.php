    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FAQ Management</title>
        <link rel="stylesheet" href="/aesthetic_gallery/view/css/admindashboard.css">
    </head>

    <body>
        <?php require_once 'partial/sidebare_admin.php'; ?>
        <div class="main-content">
            <h2>FAQ Management</h2>
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
                                <button class="save-btn" data-id="<?= $faq['Id_FAQ']; ?>">Save</button>
                                <button class="delete-btn" data-id="<?= $faq['Id_FAQ']; ?>">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <script>
            // Handle Edit (Save) Action
            // Handle Edit (Save) Action
            document.querySelectorAll('.save-btn').forEach(button => {
                button.addEventListener('click', async () => {
                    const id = button.getAttribute('data-id');
                    const row = document.getElementById(`faq-${id}`);
                    const question = row.querySelector('.editable-question').innerText.trim(); // Corrected to use .innerText
                    const answer = row.querySelector('.editable-response').innerText.trim(); // Corrected to use .innerText

                    if (!question || !answer) {
                        alert('Question and response cannot be empty.');
                        return;
                    }

                    try {
                        fetch('/aesthetic_gallery/controller/admin/update_faq.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({
                                    id: id, // Change 'id_faq' to 'id'
                                    question: question,
                                    response: answer // Change 'answer' to 'response'
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                console.log(data);
                                if (data.success) {
                                    alert('FAQ updated successfully.');
                                } else {
                                    alert(data.message || 'An error occurred while updating the FAQ.');
                                }
                            });
                    } catch (error) {
                        console.error('Error:', error);
                        alert('An error occurred while updating the FAQ.');
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
                                alert('FAQ deleted successfully.');
                                row.remove(); // Remove the row from the table
                            } else {
                                alert(data.message || 'An error occurred while deleting the FAQ.');
                            }
                        } catch (error) {
                            console.error('Error:', error);
                            alert('An error occurred while deleting the FAQ.');
                        }
                    }
                });
            });
        </script>
    </body>

    </html>