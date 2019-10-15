<?php
// Include all the Slim dependencies. Composer creates an 'autoload.php' inside
// the 'vendor' directory which will, in turn, include all required dependencies.
require '/var/www/html/share/vendor/autoload.php';


// Create a new Slim App object. (v3 method)
$app = new \Slim\App;

$container = $app->getContainer();

$container['db'] = function(){
    $conn = new PDO ("mysql:host=localhost;dbname=dftitutorials;","dftitutorials","dftitutorials");
    return $conn;
};


// Setup a route (see below) http request, response
$app->get('/all_songs', function ($req, $res, array $args) {
    $stmt = $this->db->prepare("SELECT * FROM wadsongs");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //$res->getBody()->write("".$rows.""); //html 
    if(count($rows)==0){
        return $res
            ->withHeader('content-Type', 'text/html')
            ->withStatus(404)
            ->write('Page not found');
    } else {
    return $res->withJson($rows);
    }
});

// Setup a route (see below) http request, response
$app->get('/artist/{artist}', function ($req, $res, array $args) {
    if(strlen($args < 1)){
        return "Please enter more than one character :-)"; // tried to error check arguments. Didn't work..
    } else {
    $stmt = $this->db->prepare("SELECT * FROM wadsongs WHERE artist LIKE :aName");
    $artist = $args["artist"];
     // this is how to wildcard with bind params
    $stmt->bindParam (':aName', '%'.$args["artist"].'%');
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //$res->getBody()->write("".$rows.""); //html 
    if(count($rows)==0){
        return $res
        ->withStatus(404)
        ->withHeader('content-Type', 'text/html')
        ->write('Page not found');
    } else {
    return $res->withJson($rows);
    }
});

// Setup a route (see below) http request, response
$app->get('/song/{song}/artist/{artist}', function ($req, $res, array $args) {
    $stmt = $this->db->prepare("SELECT * FROM wadsongs WHERE title=? AND artist=?");
    $stmt->bindParam (1, $args["song"]);
    $stmt->bindParam (2, $args["artist"]);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //$res->getBody()->write("".$rows.""); //html 
    if(count($rows)==0){
        return $res
            ->withStatus(404)
            ->withHeader('content-Type', 'text/html')
            ->write('Page not found');
    } else {
    return $res->withJson($rows);
    }
});

//song/{id}/order




//POST review route -- review must be longer than 5 characters
$app->post('/review/{id}/create', function ($req, $res, array $args) {
    $postData = $req->getParsedBody();
    if(strlen($postData["review"]) <= 5){
        return $res
            ->withStatus(400) //bad request status
            ->withHeader('content-Type', 'text/html')
            ->write('bad request');
    } else {
        $stmt = $this->db->prepare("INSERT INTO reviews (review, songID) VALUES(?, ?)"); // postDATA from client review 
        $stmt->bindParam (1, $postData["review"]);
        $stmt->bindParam (2, $args["id"]);
        $stmt->execute();
    }
});

// Run the application
$app->run();
?>