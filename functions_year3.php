<?php
function connect()
{

    $conn = new PDO ("mysql:host=localhost;dbname=wad;","wad","wad");
    
    return $conn;
}


?>