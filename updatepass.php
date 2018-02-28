
<html>
<head>
<title>Change password</title>
</head>searchresults.php
<?php

$username = $_POST["username"]; 
$password = $_POST ["newpassword"];
index.php

$conn = new PDO ("mysql:host=localhost;dbname=ephp046;", "ephp046", "thigheep");

$queryName = $conn->query("SELECT name FROM ht_users WHERE name = '$username';");
$errors = $queryName->fetch();

$results = $conn->query("UPDATE ht_users SET password = '$password'; WHERE username ='$username';");
//had to include ';' after each condition for update to work



// If $errors is equal to "false", ENTRY SUCCESS else display error
if ($errors = 0) {
    echo "Database entry was a success<br/>";
    }
else{
    echo "<strong> NO USER BY THAT NAME </strong> <br/>";
    echo $conn->errorInfo()[2];
}
?>
<body>
    
</body>