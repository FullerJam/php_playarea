<?php
header("Content-type: application/json"); // tells client that data is returning in json format
include('functions_year3.php');//include all code from selected file
$artist = $_GET["artist"];
$con = connect(); // functions wrtten in functions.php

if (strlen($artist)<=1){
    echo "please enter more than one character";
} else {
    $results = $con->query("select * from httracks where artist LIKE'%$artist%'");
$row = $results->fetchAll(PDO::FETCH_ASSOC); //fetchAll(PDO:FETCH_ASSOC) fetchs all matches // PDO FETCH_ASSOC forces associative array 
echo json_encode($row);
/*The SQL LIKE Operator
The LIKE operator is used in a WHERE clause to search for a specified pattern in a column.
There are two wildcards used in conjunction with the LIKE operator:
% - The percent sign represents zero, one, or multiple characters
_ - The underscore represents a single character
https://www.w3schools.com/sql/sql_like.asp
*/ 
}
?>
