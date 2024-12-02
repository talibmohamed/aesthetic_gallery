<?php

class Router {
    public static function handle($url) {
        // Define routes and their callbacks
        $routes = [
            'home' => function() {
                include 'controller/home.php';
            },
            'about' => function() {
                include 'controller/about.php';
            }
        ];

        //! Handle dynamic route (e.g., /user/12) to do



        // Check if the route exists
        if (array_key_exists($url, $routes)) {
            $routes[$url]();
        } else {
            // Show 404 page for unknown routes
            include 'view/404.html';
        }
    }
}
