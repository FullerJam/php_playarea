<?php
session_start();
// Test that the authentication session variable exists

if (!isset ($_SESSION["gatekeeper"])){
    header("refresh:5 url=login.html");
    echo "You're not logged in. ";
}
else if (!isset ($_SESSION["isadmin"])){
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

