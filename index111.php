<?php
// Get the route from the query parameter
$route = isset($_GET['route']) ? $_GET['route'] : '/';

// Define routes and their corresponding HTML files
$routes = [
    '/' => 'index.html',
    '/contact' => 'contact.html',
];

// Check if the route exists in the defined routes
if (array_key_exists($route, $routes)) {
    // Include the corresponding HTML file
    include($routes[$route]);
} else {
    // Handle a 404 error or redirect to a custom error page
    header("HTTP/1.0 404 Not Found");
    echo "404 - Page not found";
}
