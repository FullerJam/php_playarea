<?php
include ('functions.php');
$con = connect();
$id = $_GET["song-id"];
$results = $con->query("select * from wadsongs where ID='$id'");
$row = $results->fetch();


if($row == false) {
    echo "PLEASE ENTER A VALID SONG ID";
}
else
 {
    echo "<head><link rel='stylesheet' type='text/css' href='styles.css'></head>";
    echo "<div class='wrapper'>";
    echo "<div class='banner'><img src='http://edward2.solent.ac.uk/~ephp046/PHP_PLAYAREA/hittastic.png' alt='This should be an image'></div>";
    echo "<div class='cuntainer'>";
    echo "<h1>Song Details</h1>";
    echo "<form method='post' action='changedetails2.php'>";
    echo "<label for='id'>UPDATE FORM</label><br/>";
    echo "<input name='song-id' type='hidden' value='".$row["ID"]."'/><br/>";
    echo "<label for='id'>Title</label><br/>";
    echo "<input name='title' type='text' value='".$row["title"]."'/><br/>";
    echo "<label for='id'>Artist</label><br/>";
    echo "<input name='artist' type='text' value='".$row["artist"]."'/><br/>";
    echo "<label for='id'>Day</label><br/>";
    echo "<input name='day' type='text' value='".$row["day"]."'/><br/>";
    echo "<label for='id'>Month</label><br/>";
    echo "<input name='month' type='text' value='".$row["month"]."'/><br/>";
    echo "<label for='id'>Year</label><br/>";
    echo "<input name='year' type='text' value='".$row["year"]."'/><br/>";
    echo "<label for='id'>Chart</label><br/>";
    echo "<input name='chart' type='text' value='".$row["chart"]."'/><br/>";
    echo "<label for='id'>Likes</label><br/>";
    echo "<input name='likes' type='text' value='".$row["likes"]."'/><br/>";
    echo "<label for='id'>Downloads</label><br/>";
    echo "<input name='downloads' type='text' value='".$row["downloads"]."'/><br/>";
    echo "<label for='id'>Genre</label><br/>";
    echo "<input name='genre' type='text' value='".$row["genre"]."'/><br/>";
    echo "<input type='submit' value='Go!'/>";
    echo "</div>";
    echo "</div>";
}

//print_r($conn->errorInfo()); //errorInfo() returns an array with three members
                            //print_r() prints the entire contents of an array

?>