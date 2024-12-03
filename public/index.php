<?php
// Autoload classes (optional, if you use a class-based structure)
require_once '../router.php';

// Get the requested URL from the query string
$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '/';

// Pass the URL to the router
Router::handle($url);
?>
