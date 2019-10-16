<?php
$review = $_POST["review"];
$id = $_POST["songID"];
$connection = curl_init();
curl_setopt($connection, CURLOPT_URL, "https://edward2.solent.ac.uk/~wad1923/wad/review/".$id."/create");// <-- not sure if this is how i should be splicing the url
$dataToPost = 
    ["review" => "$review"];
curl_setopt($connection,CURLOPT_RETURNTRANSFER,1);
curl_setopt($connection,CURLOPT_POSTFIELDS,$dataToPost);
$response = curl_exec($connection);

$httpCode = curl_getinfo($connection,CURLINFO_HTTP_CODE); //retrieve httpCode response using curl
curl_close($connection);

$responseMessage = "";

if($httpCode == 400){
    $responseMessage = "$httpCode Bad request <br><br> You will be redirected shortly";
} else {
    $responseMessage = "Thank you for your review <br><br> You will be redirected shortly";
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
 }, 4500);
 </script>
</html>'";
?>