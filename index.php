<?php

require_once __DIR__ . '/dbconfig.php'; //load up mysql connections
$routes = require_once('routes.php'); //get the routes
// require_once __DIR__ . '/models/AuthorModel.php';


//get uri info
$request_uri = $_SERVER["REQUEST_URI"];
$request_method = $_SERVER['REQUEST_METHOD'];

var_dump($request_method . "<br>", $request_uri);

// Extract route from URI
$route = strtok($request_uri, '?');
$route = rtrim($route, '/');
$method = strtoupper($request_method);

// Check if route exists
if (isset($routes[$method][$route])) { //geting object to see if that method exist for that route and then picks it
    list($controllerName, $methodName) = explode('@', $routes[$method][$route]);
    require_once('controllers/' . $controllerName . '.php');
    // require_once __DIR__ . '/models/AuthorModel.php';
    // $controller = new $controllerName(new AuthorModel($conn)); 
    $controller = new $controllerName();
    $controller->$methodName();
} else {
    var_dump($route);
    http_response_code(404);
    echo json_encode(["message" => "Route not found"]);
}



