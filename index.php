<?php

// index.php
$request_uri = $_SERVER["REQUEST_URI"];
$request_method = $_SERVER['REQUEST_METHOD'];

$routes = require_once('routes.php');

// Extract route from URI
$route = strtok($request_uri, '?');
$route = rtrim($route, '/');
$method = strtoupper($request_method);

// Check if route exists
if (isset($routes[$method][$route])) { //geting object to see if that method exist for that route and then picks it
    list($controllerName, $methodName) = explode('@', $routes[$method][$route]);
    require_once('controllers/' . $controllerName . '.php');
    $controller = new $controllerName();
    $controller->$methodName();
} else {
    http_response_code(404);
    echo json_encode(["message" => "Route not found"]);
}



