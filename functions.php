<?php
function connect()
{
    $conn = new PDO ("mysql:host=localhost;dbname=ephp046;", "ephp046", "thigheep");
    return $conn;
}


?>