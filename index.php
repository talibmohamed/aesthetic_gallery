<?php
// Define the base path of your project
$basePath = '/aesthetic_gallery';

// Get the URI and remove the base path
$uri = str_replace($basePath, '', parse_url($_SERVER['REQUEST_URI'])['path']);

// Define the routes
$routes = [
    '/' => 'controller/home.php',
    '/about' => 'controller/about.php',
    '/contact' => 'controller/contact.php',
    '/signup' => 'controller/signup.php',
];

// Route the request
function routetocontroller($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        return $routes[$uri];
    } else {
        return '404.php'; // Return the 404 page path
    }
}

// Get the controller path
$controller = routetocontroller($uri, $routes);

// Include the controller file
if (file_exists($controller)) {
    include $controller;
} else {
    echo "Error: Controller file not found.";
}
