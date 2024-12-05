<?php

class Router {
    public static function handle($url) {
        // Define routes and their callbacks
        $routes = [
            '/' => function() {
                // include css
                include 'controller/home.php';
            },
            // sign in
            'sign-in' => function() {
                include 'controller/sign-in.php';
            },
            'about' => function() {
                include 'controller/about.php';
            },
            'products' => function() {
                include 'controller/products.php';
            },
            'product' => function() {
                include 'controller/productController.php';
            }
        ];

        // // Handle dynamic route (e.g., /product/12)
        // if (preg_match('#^product/(\d+)$#', $url, $matches)) {
        //     $_GET['id'] = $matches[1]; // Pass product ID to controller
        //     include 'controller/productController.php';
        //     return;
        // }

        // Check if the route exists
        if (array_key_exists($url, $routes)) {
            $routes[$url]();
        } else {
            include 'view/404.html';
        }
    }
}
