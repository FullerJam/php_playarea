<?php
include ('functions.php');
$ID= $_POST["song-id"];
$title= $_POST["title"];
$artist= $_POST["artist"];
$day= $_POST["day"];
$month= $_POST["month"];
$chart= $_POST["chart"];
$likes= $_POST["likes"];
$downloads= $_POST["downloads"];
$genre= $_POST["genre"];

connect();
$results = connect()->query("UPDATE wadsongs SET title='$title',artist='$artist',day='$day',month='$month',chart='$chart',likes='$likes',downloads='$downloads',genre='$genre' WHERE ID ='$ID';");

if ($results){
    echo "Database entry was a success";
}
else{
    echo connect()->errorInfo()[2]; //2	Driver-specific error message.
}


?>