<?php
session_start();

// Ensure only admins can access this page
// if (!isset($_SESSION['id_user']) || $_SESSION['user_type'] !== 'admin') {
//     http_response_code(403);
//     echo json_encode(['success' => false, 'message' => 'Unauthorized access.']);
//     exit;
// }

// Include database and user model
require_once '../../model/db.php';
require_once '../../model/user.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Id_user'])) {
    // Get the raw POST data
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['Id_user'])) {
        $userId = $data['Id_user'];

        // Create database connection and delete user
        $database = new Database();
        $db = $database->getConnection();
        $userModel = new User($db);

        // Delete the user
        $isDeleted = $userModel->deleteUser($userId);

        // Send response back to the client
        if ($isDeleted) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid request.']);
    }

}

// Fetch all users from the database
$database = new Database();
$db = $database->getConnection();
$userModel = new User($db);
$users = $userModel->getAllUsers();

// Load the view file
require_once '../../view/admin_pages/dashboard_users.view.php';
