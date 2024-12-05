<?php
// Include the router
require_once '../router.php';

// Get the requested URL
$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '/';

// Check if the request is for a static file and serve it directly
if (preg_match('/\.(?:png|jpg|jpeg|gif|css|js|svg)$/', $url)) {
    return false; // This lets the webserver handle static files
}

// Handle dynamic routes
Router::handle($url);
