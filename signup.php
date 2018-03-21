<html>
<head>
<title>PHP Test</title>
</head>
<body>

<?php
include('functions.php');

$u = $_POST["username"];
$p = $_POST["password"];
$name = $_POST["name"];
$day = $_POST["day"];
$month = $_POST["month"];
$year = $_POST["year"];

$con = connect();
$results = $con->query("INSERT INTO ht_users (name,username,password,yearofbirth,monthofbirth,dayofbirth) VALUE ('$name','$u','$p','$year','$month','$day')");

if ($results){
    echo "Database entry was a success";
}
else{
    echo $con->errorInfo()[2]; //2	Driver-specific error message.
}


//get current year
$currentDate = getdate();
//fetches year from currentDate and stores in $y
$currentYear=$currentDate["year"]; 
$currentMonth=$currentDate["month"];

echo "<h1>$currentMonth</h1>";
echo "<h1>Hello $name!</h1>";
echo "<p>Your username is : $u!</p>";
echo "<p>Your password is : $p!</p>";
echo "<p>Your name is : $name!</p>";
echo "<p>Your age is : $age!</p>";
echo "<p>Your month of birth is : $month!</p>";
echo "<p>Your year of birth is : $year!</p>";


if ($year + 18 < $currentYear){
    echo "you are not old enough to use this service";
}

if ($currentMonth == "January"){
    echo "<p>HAPPY NEW YEAR</p>";
}



?>

</body>
</html>