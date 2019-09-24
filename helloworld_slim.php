<?php

// Import classes from the Psr library (standardised HTTP requests and responses)
// This is a PHP feature called NAMESPACES. Namespaces prevent clashes in class names, e.g.
// we might have two separate PHP libraries, each with their own ServerRequestInterface class. 
// Slim solves this by putting the ServerRequestInterface class in the 
// 
// Psr\Http\Message\ 
// 
// namespace, so we have to import it from this namespace (with the "use" keyword) to use it. 
// The "as Request" is an alias, meaning we can refer to the class a
// "Request" rather than "ServerRequestInterface".

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

// Include all the Slim dependencies. Composer creates an 'autoload.php' inside
// the 'vendor' folder which will, in turn, include all required dependencies.
require 'vendor/autoload.php';


// Create a new Slim App object. (v3 method)
$app = new \Slim\App;

// Setup a route (see below)
$app->get('/', function (Request $req, Response $res, array $args) {
    $res->getBody()->write('Hello World from Slim!');
    return $res;
});

// Run the application
$app->run();
?>