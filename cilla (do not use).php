<?php
include('functions.php');//include all code from selected file
$con = connect(); // function wrtten in functions.php, log as a variable or you access the database an infinite number of times
$results = $con->query("select * from wadsongs where artist='Cilla Black'");
$row = $results->fetch();

// If $row is equal to the value "false", display an error
if ($row == false) 
{
    echo "No matching rows!";
}

else{
    echo "<h4 style='margin:0 0 10px 18px'>Hit songs</h4>";
while($row != false)
{
    echo "<p>";
    echo "" .$row["title"] . "<br/> " ; 
    echo "" .$row["day"]. "/" ; 
    echo "" .$row["month"]. "/" ; 
    echo "" .$row["year"]. "<br/>" ;
    echo " Downloads #" .$row["downloads"]. "<br/>";    
    echo "<a href='https://www.youtube.com/results?search_query=".$row["artist"]." ".$row["title"]."'>Listen on Youtube!</a> <br/>";
    echo "<a href='download.php?songID=".$row["ID"]."'>Download</a><br/>";
    echo "<a href='order1.php?songID=".$row["ID"]."'>Order a copy</a>";
    echo "</p>";
    $row = $results->fetch();    
}
}
//print_r($conn->errorInfo()); //errorInfo() returns an array with three members
                            //print_r() prints the entire contents of an array

?>
