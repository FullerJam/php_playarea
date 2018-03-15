<?php
    include ('functions.php');
    connect();
    session_start();
    
    $un = $_POST["username"];
    $pw = $_POST["password"];
    
    $results = connect()->query("SELECT * from ht_users WHERE username='$un'");
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