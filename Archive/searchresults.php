<?php
include('functions.php');//include all code from selected file
$artist = $_GET["artist"];
$con = connect(); // function wrtten in functions.php, log as a variable or you access the database an infinite number of times
$results = $con->query("select * from wadsongs where artist='$artist'");
$row = $results->fetch();

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
    echo " Song Title " .$row["title"] . "<br/> " ; 
    echo " Day " .$row["day"]. "<br/>" ; 
    echo " Month " .$row["month"]. "<br/>" ; 
    echo " Year " .$row["year"]. "<br/>" ;
    echo " Downloads " .$row["downloads"]. "<br/>";
    echo " Quantity " .$row["quantity"]. "<br/>";
    echo "</p>";
    echo "<a href='download.php?songID=".$row["ID"]."'>Download</a><br/>";
    echo "<a href='https://www.youtube.com/results?search_query=".$row["artist"]." ".$row["title"]."'>Listen to the song on Youtube!</a> <br/>";
    echo "<a href='order1.php?songID=".$row["ID"]."'>Order a copy</a>";
    $row = $results->fetch();    
}
}
//print_r($conn->errorInfo()); //errorInfo() returns an array with three members
                            //print_r() prints the entire contents of an array

?>
