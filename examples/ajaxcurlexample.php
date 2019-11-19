<?
$location = $_GET["location"];
$connection = curl_init();
curl_setopt($connection, CURLOPT_URL, "https://awebservice/ajaxsearch/".$location);

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
foreach($phpArray as $key => $value){
    echo "Accomodation ".$value["name"]."<br>".$value["type"]."
