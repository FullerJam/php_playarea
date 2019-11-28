<?
$app->get('search/location/hampshire', function ($req, $res, array $args) {
    $stmt = $this->db->prepare("SELECT * FROM accommodation WHERE location=?");
    $stmt->bindParam (1, $args["hampshire"]);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //$res->getBody()->write("".$rows.""); //if you want html 
    if(count($rows)==0){
        return $res
            ->withStatus(404)
            ->withHeader('content-Type', 'text/html')
            ->write('Page not found');
    } else {
    return $res->withJson($rows);
    }
});
