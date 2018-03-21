<?php
    include ('functions.php');
    $con = connect();
    session_start();
    
    $un = $_POST["username"];
    $pw = $_POST["password"];
    
    $results = $con->query("SELECT * from ht_users WHERE username='$un'");
    $row = $results->fetch();
    
    if ($row!=false) {
        if($pw == $row["password"]){
        $_SESSION["gatekeeper"] = $un;
        $_SESSION["user_role"]  = $admin;
        header ("Location: index.php");
        } else {
            echo "incorrect password";
        }
        
    }
    else{
        echo "no user by that name";
    }
    
?>