<?php
require_once '../../model/db.php';
require_once '../../model/cgu.php';

header('Content-Type: application/json');

// Parse JSON input
$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['condition'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid input.']);
    exit;
}

$condition = trim($data['condition']);

$database = new Database();
$db = $database->getConnection();
$cgu = new CGU($db);

if ($cgu->create($condition)) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to create CGU.']);
}
exit;
?>
