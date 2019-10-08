<?php
$review = $_POST ["review"];
$connection = curl_init();
curl_setopt($connection, CURLOPT_URL, "https://edward2.solent.ac.uk/~wad1923/wad/review/{id}/create");
$dataToPost = 
    ["review" => "$review"];
curl_setopt($connection,CURLOPT_RETURNTRANSFER,1);
curl_setopt($connection,CURLOPT_POSTFIELDS,$dataToPost);
$response = curl_exec($connection);
curl_close($connection);

//convert json string to Object
#$myObject = json_decode($myJSON);
#print_r($myObject);
#echo $myObject[0]->name;
?>