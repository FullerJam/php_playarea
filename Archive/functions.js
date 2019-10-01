
function ajaxrequest(){
    // Create the XMLHttpRequest variable.
    // This variable represents the AJAX communication between client and
    // server.
    var xhr2 = new XMLHttpRequest();

    // Read the data from the form fields.
    var artist = document.getElementById("artist").value;

    // Specify the CALLBACK function. 
    // When we get a response from the server, the callback function will run
    xhr2.addEventListener ("load", responseReceived);

    // Open the connection to the server
    // We are sending a request to "flights.php" and passing in the 
    // destination and date as a query string. 
    xhr2.open('GET',
        'https://edward2.solent.ac.uk/~ephp046/PHP_PLAYAREA/ajaxsearchresults.php?artist=' + artist);

    // Send the request.
    xhr2.send();
}

function responseReceived(e)
{
    document.getElementById('response').innerHTML = e.target.responseText;
}