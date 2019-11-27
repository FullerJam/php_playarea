<?php
require '/var/www/html/share/vendor/autoload.php';

$app = new \Slim\App;

$container = $app->getContainer();

$container["db"]=function () {
    $conn = new PDO("pgsql:host;localhost;dbname=gis", "gis");
    return $conn;
};

$app->get('/search/{name}', function($req, $res, $args) {
    $stmt = $this->db->prepare("select name,ST_AsGeoJSON(ST_transform (way,4326)) from planet_osm_point where place<>'' and name=?");
    $stmt->execute([$args["name"]]);
    $results = $stmt->fetchAll();
    return $res->withJson($results);
});


$app->run();
?>