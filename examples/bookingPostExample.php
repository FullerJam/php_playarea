<?
$app->post('/booking/{id}/{pax}/{date}/{username}', function ($req, $res, array $args) {
        $stmt = $this->db->prepare("INSERT INTO acc_bookings (accID, npeople, thedate, username) VALUES(?, ?, ?, ?)");  
        $stmt->bindParam (1, $args["id"]);
        $stmt->bindParam (2, $args["pax"]);
        $stmt->bindParam (3, $args["date"]);
        $stmt->bindParam (4, $args["username"]);
        $stmt->execute();
});