<?php
include('functions.php');//include all code from selected file
$artist = $_GET["artist"];
$con = connect(); // functions wrtten in functions.php

if (strlen($artist)<=1){
    echo "please enter more than one character";
}
else {

$results = $con->query("SELECT * from wadsongs where artist LIKE'$artist%'");
$row = $results->fetch();

/*The SQL LIKE Operator
The LIKE operator is used in a WHERE clause to search for a specified pattern in a column.
There are two wildcards used in conjunction with the LIKE operator:
% - The percent sign represents zero, one, or multiple characters
_ - The underscore represents a single character
https://www.w3schools.com/sql/sql_like.asp
*/ 


// If $row is equal to the value "false", display an error
if ($row == false) 
{
    echo "No matching rows!";
}

else
{
echo "<head>";
echo "<link rel='stylesheet' type='text/css' href='styles.css'>";
echo "</head>";


while($row != false)
{
    echo "<p>";
    echo " ID ".$row["ID"]."<br/>";
    echo " Artist ".$row["artist"] ."<br/> ";
    echo " Song Title " .$row["title"] . "<br/> ";
    echo " Day " .$row["day"]. "<br/>"; 
    echo " Month " .$row["month"]. "<br/>";
    echo " Year " .$row["year"]. "<br/>";
    echo " Downloads " .$row["downloads"]. "<br/>";
    echo " Quantity " .$row["quantity"]. "<br/>";
    echo " Likes <span id='like".$row["ID"]."'>".$row["likes"]."</span><br/>"; 
    /*target likes with a span & id so that it can be targeted individually making xml query more efficient*/
    echo "</p>";
    echo "<a href='download.php?songID=".$row["ID"]."'>Download</a><br/>";
    echo "<a href='https://www.youtube.com/results?search_query=".$row["artist"]." ".$row["title"]."'>Listen to the song on Youtube!</a> <br/>";
    echo "<a href='order1.php?songID=".$row["ID"]."'>Order a copy</a><br/>";
    echo "<a href='#' onclick='like(".$row["ID"].")'>Like</a>";
    $row = $results->fetch();
}
}
//print_r($conn->errorInfo()); //errorInfo() returns an array with three members
                            //print_r() prints the entire contents of an array

}

?>
</body>
</html>