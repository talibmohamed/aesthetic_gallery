<?php
// Define the base path of your project
$basePath = '/aesthetic_gallery';

// Get the URI and remove the base path
$uri = str_replace($basePath, '', parse_url($_SERVER['REQUEST_URI'])['path']);

// Get the query parameters
$queryParams = $_GET; // This will capture query strings like ?id=1

// Define the routes
$routes = [
    '/' => 'controller/home.php',
    '/home' => 'controller/home.php',
    '/about' => 'controller/about.php',
    '/contact' => 'controller/contact.php',
    '/signup' => 'controller/signup.php',
    '/login' => 'controller/login.php',
    // admin
    '/dashboard' => 'controller/admin/admindashboard.php',
    '/terms' => 'controller/cgu.php',
    '/faq' => 'controller/faq.php',
    '/article' => 'controller/article.php', 
    '/profile' => 'controller/profile.php',
    '/logout' => 'controller/logout.php',
    '/admin' => 'controller/admin/admindashboard.php',
    '/admin/faq' => 'controller/admin/adminfaq.php',
    '/admin/cgu' => 'controller/admin/admincgu.php',
    '/forgotpassword' => 'controller/forgotpassword.php',
    // upload art page
    '/upload' => 'controller/upload.php',
    '/artwork' => 'controller/artwork.php',
];

// Route the request
function routetocontroller($uri, $routes)
{
    // Check if the URI exists in the routes
    if (array_key_exists($uri, $routes)) {
        return $routes[$uri];
    } else {
        return 'view/404.php'; // Default 404 page
    }
}

// Get the controller path
$controller = routetocontroller($uri, $routes);

// Include the controller file and pass query parameters
if (file_exists($controller)) {
    include $controller;
} else {
    echo "Error: Controller file not found.";
}
