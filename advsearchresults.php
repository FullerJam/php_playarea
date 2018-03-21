<?php
include('functions.php');
$select = $_GET["select"];
$search = $_GET["search"];
$con = connect();
$results = $con->query("select * from wadsongs where $select = '$search'"); //wrap $search in single quotes or you get SQL syntax error 
$row = $results->fetch();

echo "<head>";
echo "";
echo "</head>";

// If $row is equal to the value "false", display an error
if ($row == false) 
{
    echo "No matching rows!";
}

else{
echo "<h1>Hello!</h1>";
echo "<p>Your search was : $search</p>";

while($row!=false)
{
    echo "<p>";
    echo " Artist ".$row["artist"] ."<br/> ";
    echo " Song Title " . $row["title"] . "<br/> " ; 
    echo " Day " .$row["day"]. "<br/>" ; 
    echo " Month " .$row["month"]. "<br/>" ; 
    echo " Year " .$row["year"]. "<br/>" ;
    echo " Genre" .$row["genre"]. "<br/>";
    echo "</p>";
    
    $row = $results->fetch();
}
}
print_r($con->errorInfo()); //errorInfo() returns an array with three members
                            //print_r() prints the entire contents of an array

?>