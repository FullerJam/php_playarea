<?php
include('functions.php');
connect();
$id = $_GET["songID"];
$like = connect()->query("UPDATE wadsongs SET likes=likes+1 where ID='$id'");
?>