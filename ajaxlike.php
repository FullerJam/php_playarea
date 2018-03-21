<?php

include('functions.php');
//update query to insert new likes with onclick link
$con = connect();
$id = $_GET["songID"];
$like = $con->query("UPDATE wadsongs SET likes=likes+1 where ID='$id'");


//this query returns the new value of likes 
$results = $con->query("SELECT likes FROM wadsongs where ID='$id'");
$row=$results->fetch();
echo $row["likes"]; 
?>