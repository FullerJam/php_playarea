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
    $artist = "%". $args['artist']. "%"; //how to wildcard bind params, thanks stubert
    $stmt = $this->db->prepare("SELECT * FROM wadsongs WHERE artist LIKE ?");
    $stmt->bindParam(1, $artist);
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


//post route
$app->post('/review/{id}/create', function ($req, $res, array $args) {
    $postData = $req->getParsedBody();
    if(strlen($postData["review"]) < 5){
        return $res
        ->withStatus(400) //bad request status
        ->withHeader('content-Type', 'text/html')
        ->write('Page not found');
    } else {
        $stmt = $this->db->prepare("INSERT INTO reviews (review, songID) VALUES(?, ?)"); // postDATA from client review 
        $stmt->bindParam (1, $postData["review"]);
        $stmt->bindParam (2, $args["id"]);
        $stmt->execute();
    }
});

//Order route
$app->post('/song/{id}/order/{qty}', function ($req, $res, array $args) {
     //retrieves value from an associative array?
    if($args["qty"] <= 5){    
        $stmt = $this->db->prepare("INSERT INTO orders (songID, quantity) VALUES(?, ?)"); // postDATA from order track
        $stmt->bindParam (1, $args["id"]);
        $stmt->bindParam (2, $args["qty"]);
        $stmt->execute();
    } else {
        return $res
        ->withStatus(400) //bad request status
        ->withHeader('content-Type', 'text/html')
        ->getBody()->write('Page not found. You can only buy a maximum of 5 copies each order.');
    }
});

$app->get('/lala', function ($req, $res, array $args) {
    return $res->getBody()->write("lala");
});

//map locations route
$app->get('/map/{lat}/{lon}', function ($req, $res, array $args){
    $postData = $req->getParsedBody();
    if(strlen($postData["type"] || $postData["desc"]) < 1){
        return $res
        ->withStatus(400) //bad request status
        ->withHeader('content-Type', 'text/html')
        ->write('Type or description empty');
    } else {
        $stmt = $this->db->prepare("INSERT INTO annotations (lat, lon, type, description) VALUES(?, ?, ?, ?)"); // postDATA from client review 
        $stmt->bindParam (1, $args["lat"]);
        $stmt->bindParam (2, $args["lon"]);
        $stmt->bindParam (3, $postData["type"]);
        $stmt->bindParam (4, $postData["desc"]);
        $stmt->execute();
        //error checking, returns values it's recieved DEBUG
        return $res->withJson(["args"=>$args, "post"=>$postData]);
    }
    
 });

// Run the application
$app->run();
?>