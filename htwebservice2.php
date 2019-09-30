<?php
header("Content-type: application/json"); // tells client that data is returning in json format
include('functions_year3.php');//include all code from selected file
$artist = "Cilla black";

$con = connect(); // functions wrtten in functions.php

$results = $con->query("select * from httracks where artist LIKE'%$artist%'");
/*The SQL LIKE Operator
The LIKE operator is used in a WHERE clause to search for a specified pattern in a column.
There are two wildcards used in conjunction with the LIKE operator:
% - The percent sign represents zero, one, or multiple characters
_ - The underscore represents a single character
https://www.w3schools.com/sql/sql_like.asp
*/ 
$row = $results->fetchAll(PDO::FETCH_ASSOC); //fetchAll(PDO:FETCH_ASSOC) fetchs all matches // PDO FETCH_ASSOC forces associative array 

$myJSON = json_encode($row); // encodes results to JSON

//convert JSON string to Array
$phpArray = json_decode($myJSON, true); // converts JSON data to array
#print_r($phpArray); //dump all data of the array
foreach($phpArray as $key => $value){
    echo $value["title"]."&nbsp;&nbsp;Date:&nbsp".$value["day"]."&nbsp;".$value["month"]."&nbsp".$value["year"]."<br>"; // Access Array data
}

// see https://stackoverflow.com/questions/5720260/as-operator-in-php for explanation of as operator



//convert json string to Object
#$myObject = json_decode($myJSON);
#print_r($myObject);
#echo $myObject[0]->name;
