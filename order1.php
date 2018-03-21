<?php
    include('functions.php');
    $con = connect();
    $id=$_GET["songID"];
    $results = $con->query("SELECT quantity FROM wadsongs WHERE ID='$id'");
    $row = $results->fetch();
    
    
    // If the form was posted, process it...
    // If statement stops php running until qty value has been input
    if (isset($_POST["qty"]))
    {
        $qty=$_POST["qty"];
        $id=$_POST["songID"];
        $resultsUpdate = $con->query("UPDATE wadsongs SET quantity=quantity-'$qty' WHERE ID='$id'");

        $orderQuantity=$con->query("SELECT quantity From wadsongs where ID='$id'");
        $row2=$orderQuantity->fetch(); //added another database connection to fetch new quantity value
        echo "Order sucessfull, '$qty' copy/copies have been dispatched";
        echo "<p>".$row2['quantity']." copy/copies remaining</p>";
        echo "<a href='index.php' class='center'>Back to search</a>";
    }
    // otherwise, read the ID from the query string and put the ID
    // in the hidden field in the form...
    else 
    {
    
    $id= $_GET["songID"];
    
    echo   "<head><link rel='stylesheet' type='text/css' href='styles.css'></head>
            <form method='post' action='order1.php?songID=".$id."' class='center'>
                <input type='hidden' name='songID' value='$id'/> 
                <label>Enter order quantity</label><br/>
                <input type='number' name='qty'>
                <input type='submit' value='Order'>
            </form>";
            echo "<p class='center'>".$row['quantity']." copy/copies remaining</p>";
           // 'download.php?songID=".$row["ID"]."'>Download</a><br/>"
    }
    //added a query string to form action so that number of copies can be updated on 
    //final load, didnt work consult nick
    ?>
    
