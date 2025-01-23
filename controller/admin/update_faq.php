<?php
require_once '../../model/db.php';
require_once '../../model/faq.php';

header('Content-Type: application/json');

// test if its an admin $_SESSION['admin'] = true;
session_start();
if ($_SESSION['admin'] !== true) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

// Parse JSON input
$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['id'], $data['question'], $data['response'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid input.']);
    exit;
}

$id = intval($data['id']);
$question = trim($data['question']);
$response = trim($data['response']);

// error log the data in php_errors.log
error_log("id: $id, question: $question, response: $response");


$database = new Database();
$db = $database->getConnection();
$faq = new faq($db);

if ($faq->update($id, $question, $response)) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to update FAQ.']);
}
exit;
