<?php 
// Import classes from the Psr library (standardised HTTP requests and responses)
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

// Include all the Slim dependencies. Composer creates an 'autoload.php' inside
// the 'vendor' folder which will, in turn, include all required dependencies.
require 'vendor/autoload.php';

// Create a new Slim App object. (v3 method)
$app = new \Slim\App;



$app->get('/hello', function(Request $req, Response $res, array $args) {
    $res->getBody()->write('Hello World!');
    return $res;
});

$app->get('/time', function(Request $req, Response $res, array $args) {
    $res->getBody()->write("There have been ". time() ." milliseconds since 1/1/70.");
    return $res;
});
$app->run();
?>