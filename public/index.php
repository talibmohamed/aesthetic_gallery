<?php

// Define the base directory for views

// Get the requested URL (strip the leading slash for routing purposes)
$request = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '/';

// Use switch-case to handle routing based on the URL
switch ($request) {
    case '':
    case '/':
        // Home page
        require  'controller/home.php';
        break;

    case '/about':
        // About page
        require 'controller/about.php';
        break;

    case '/contact':
        // Contact page
        require 'controller/contact.php';
        break;

    case '/users':
        // Users page
        require 'controller/users.php';
        break;

    // Add more cases here as necessary for other pages, e.g.:
    // case '/products':
    //     require $viewDir . 'products.view.php';
    //     break;

    default:
        // 404 page for unhandled routes
        http_response_code(404);
        require 'view/404.html';
        break;
}
