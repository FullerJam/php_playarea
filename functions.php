<?php
function connect()
{
    $conn = new PDO ("mysql:host=localhost;dbname=ht_users;","root","");
    
    //$conn = new PDO ("mysql:host=localhost;dbname=ephp046;","ephp046","thigheep");
    return $conn;
}


?>