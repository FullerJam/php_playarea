<?php
include('functions.php');
session_start();
// Test that the authentication session variable exists
connect();
$results=connect()->query("SELECT isadmin from ht_users WHERE username='{$_SESSION['gatekeeper']}'");
$row = $results->fetch();

if (!isset ($_SESSION["gatekeeper"])){
    header("refresh:5 url=login.html");
    echo "You're not logged in. ";
}
else if ($row==0){
    header("refresh:5 url=login.html");
    echo "Area restricted, admin access only.";
}
   
else{
       
    echo "You are logged in as ".$_SESSION["gatekeeper"]; 
  ?>  

    <html>
    <head>
    <title>Change details of existing song</title>
    </head>
    <link rel='stylesheet' type='text/css' href='styles.css'>
    <body>
        <div class="wrapper">
            <div class="banner">
                <img src="http://edward2.solent.ac.uk/~ephp046/hittastic.png" alt="This should be an image">
            </div>
            <div class="cuntainer">
                <h1 class="center">Change details of an existing song</h1>
                <form method="get" action="changedetails1.php">
                <label for="id">ID of song:</label><br/>
                <input name="song-id"/><br/>
                <input type="submit" value="Go!"/>
            </div>
        </div>
    </body>
    </html>

<?php
}
?>              

