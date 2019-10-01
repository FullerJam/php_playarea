<?php
// Include all the Slim dependencies. Composer creates an 'autoload.php' inside
// the 'vendor' directory which will, in turn, include all required dependencies.
require 'vendor/autoload.php';


// Create a new Slim App object. (v3 method)
$app = new \Slim\App;

$container = $app->getContainer();

$container['db'] = function(){
    $conn = new PDO ("mysql:host=localhost;dbname=wad;","wad","wad");
    return $conn;
};


// Setup a route (see below) http request, response
$app->get('/all_songs', function ($req, $res, array $args) {
    $stmt = $this->db->prepare("SELECT * FROM wadsongs");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $res->getBody()->write("".$rows."");
    return $res->withJson($rows);
});

// Setup a route (see below) http request, response
$app->get('/artist/{artist}', function ($req, $res, array $args) {
    $stmt = $this->db->prepare("SELECT * FROM wadsongs WHERE artist=?");
    $stmt->bindParam (1, $args["artist"]);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //$res->getBody()->write("".$rows."");
    return $res->withJson($rows);
});

// Setup a route (see below) http request, response
$app->get('song/{song}/artist/{artist}/', function ($req, $res, array $args) {
    $stmt = $this->db->prepare("SELECT * FROM wadsongs WHERE title=? AND artist=?");
    $stmt->bindParam (1, $args["title"]);
    $stmt->bindParam (1, $args["artist"]);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $res->getBody()->write("".$rows."");
    return $res->withJson($rows);
});

// Run the application
$app->run();
?>