<?php
//header("Content-type: application/json"); // tells client that data is returning in json format, default is html
$id = $_POST["songID"];
$qty = $_POST["qty"];
// Initialise the **cURL** connection
$connection = curl_init();
// Specify the URL to connect to - this can be PHP, HTML or anything else!
curl_setopt($connection, CURLOPT_URL, "https://edward2.solent.ac.uk/~wad1923/wad/song/".$id."/order/".$qty);
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
$phpArray = json_decode($response, true); // converts JSON data to associative array
#print_r($phpArray); //dump all data of the array
 

// see https://stackoverflow.com/questions/5720260/as-operator-in-php for explanation of AS operator

if($httpCode == 400){
    $responseMessage = "$httpCode Bad request <br><br> You will be redirected shortly";
} else {
    $responseMessage = "Thank you for your order <br><br> You will be redirected shortly";
}


//convert json string to Object
#$myObject = json_decode($myJSON);
#print_r($myObject);
#echo $myObject[0]->name;
echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Review response</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'
        integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
    <link rel='stylesheet' type='text/css' href='..\styles.css'>
    <link href='https://fonts.googleapis.com/css?family=Oswald&display=swap' rel='stylesheet'>
</head>
<body>
    <div class='container mt-3'>
        
        <div class='wrapper'>
            <div class='row'>
                <div class='col p-5'>
                    <h1 class='text-center p-5'> $responseMessage </h1>
                      
                </div>
            </div>
        </div>
    </div>
</body>
<script>
setTimeout(function () {
    window.location.href = 'https://edward2.solent.ac.uk/~wad1923/fansite/htmlcilla.php'; //redirect to your page
 }, 4000);
 </script>
</html>'";
?>