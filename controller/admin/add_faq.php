<?php
require_once '../../model/db.php';
require_once '../../model/faq.php';

header('Content-Type: application/json');

// Parse JSON input
$data = json_decode(file_get_contents('php://input'), true);

// Validate the input data
if (!isset($data['question'], $data['response'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid input. Question and response are required.']);
    exit;
}

$question = trim($data['question']);
$response = trim($data['response']);

if (empty($question) || empty($response)) {
    echo json_encode(['success' => false, 'message' => 'Question and response cannot be empty.']);
    exit;
}

// Initialize database connection
$database = new Database();
$db = $database->getConnection();
$faq = new FAQ($db);

// Attempt to create the FAQ entry
if ($faq->create($question, $response)) {
    echo json_encode(['success' => true, 'message' => 'FAQ created successfully.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to create FAQ.']);
}
exit;
