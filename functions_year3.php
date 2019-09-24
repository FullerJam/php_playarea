<?php
function connect()
{

    $conn = new PDO ("mysql:host=localhost;dbname=dftitutorials;","dftitutorials","dftitutorials");
    
    return $conn;
}


?>