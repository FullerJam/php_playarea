<?php
session_start();

include('functions.php');
$id= htmlentities($_GET["songID"]);
connect();

$update0 = connect()->query("SELECT * FROM ht_users WHERE username='{$_SESSION['gatekeeper']}'");
$update1 = connect()->query("SELECT * FROM wadsongs WHERE ID ='$id'");

$wadsongRow = $update1->fetch();
$htusersRow = $update0->fetch();

if ($htusersRow["balance"] >= $wadsongRow["price"] ){
    $update3 = connect()->query("UPDATE ht_users SET balance=balance-".$wadsongRow['price']." WHERE username='{$_SESSION['gatekeeper']}'");
    $update2 = connect()->query("UPDATE wadsongs SET downloads=downloads+1 WHERE ID='$id'");
}
else {
    echo "You do not have enough money to purchase the selected track";
}




//SET balance=balance-0.79

//UPDATE ???? SET downloads=downloads+1 WHERE ????

//"UPDATE wadsongs SET title='$title',artist='$artist',day='$day',
//month='$month',chart='$chart',likes='$likes',downloads='$downloads',
//genre='$genre' WHERE ID ='$ID';");
?>