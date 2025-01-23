<?php
require_once '../../model/db.php';
require_once '../../model/cgu.php';

header('Content-Type: application/json');

// test if its an admin $_SESSION['admin'] = true;
session_start();
if ($_SESSION['admin'] !== true) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

// Parse JSON input
$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['id'], $data['condition'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid input.']);
    exit;
}

$id = intval($data['id']);
$condition = trim($data['condition']);

$database = new Database();
$db = $database->getConnection();
$cgu = new CGU($db);

if ($cgu->update($id, $condition)) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to update CGU.']);
}
exit;
?>
