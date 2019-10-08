<?php
//header("Content-type: application/json"); // tells client that data is returning in json format, default is html

// Initialise the **cURL** connection
$connection = curl_init();
// Specify the URL to connect to - this can be PHP, HTML or anything else!
curl_setopt($connection, CURLOPT_URL, "https://edward2.solent.ac.uk/~wad1923/wad/artist/cilla+black");
// This option ensures that the HTTP response is *returned* from curl_exec(),
// (see below) rather than being output to screen.  
curl_setopt($connection,CURLOPT_RETURNTRANSFER,1);
// Do not include the HTTP header in the response.
curl_setopt($connection,CURLOPT_HEADER, 0);
// Actually connect to the remote URL. The response is 
// returned from curl_exec() and placed in $response.
$response = curl_exec($connection);
// Close the connection.
curl_close($connection);
// Echo the response back from the server (for illustration purposes)

//echo "Response from server: $response"; // shows any server errors, good practice

//convert JSON string to Array
$phpArray = json_decode($response, true); // converts JSON data to array
#print_r($phpArray); //dump all data of the array
foreach($phpArray as $key => $value){
    echo $value["title"]."&nbsp;&nbsp;Date:&nbsp".$value["day"]."&nbsp;".$value["month"]."&nbsp".$value["year"]."<br>"; // Access Array data
    echo "<form method='POST' action='clientreview.php'>
    Leave a review:<br>
    <textarea name='review' rows='4'></textarea>
    <input type='hidden' name='songID' value='$value[id]'><br>
    <input type='submit'/>
    </form>";
}

// see https://stackoverflow.com/questions/5720260/as-operator-in-php for explanation of AS operator



//convert json string to Object
#$myObject = json_decode($myJSON);
#print_r($myObject);
#echo $myObject[0]->name;
