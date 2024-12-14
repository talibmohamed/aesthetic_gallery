<?php
require_once('../model/user.php');
require_once '../model/db.php';

// Decode the incoming JSON data
$input = json_decode(file_get_contents('php://input'), true);

// Check if the 'pseudo' field exists in the decoded JSON data
if (!isset($input['pseudo']) || empty($input['pseudo'])) {
    echo json_encode(['error' => 'pseudo is required.']);
    exit;
}

$pseudo = $input['pseudo'];

$database = new Database();
$db = $database->getConnection();

// Response array to store the result
$response = [
    'available' => false // Default to false
];

try {
    $user = new User($db);

    // Check the pseudo availability
    $availability = $user->checkpseudoAvailability($pseudo);
    // Set the response with the pseudo availability
    $response['available'] = $availability;
} catch (Exception $e) {
    // Log the error and return an error response
    echo json_encode(['error' => 'An error occurred: ' . $e->getMessage()]);
    exit;
}


// Return the response as JSON
echo json_encode($response);
?>
