<?php
require_once '../../model/db.php';
require_once '../../model/faq.php';

header('Content-Type: application/json');

// Parse JSON input
$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['id'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid input.']);
    exit;
}

$id = intval($data['id']);

// Error log the data in php_errors.log
error_log("Deleting FAQ with id: $id");

$database = new Database();
$db = $database->getConnection();
$faq = new FAQ($db);

if ($faq->delete($id)) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to delete FAQ.']);
}
exit;
