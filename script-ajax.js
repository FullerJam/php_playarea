// JavaScript file, ajax1.js
function init() {


    // For simplicity, we're specifying that when the button clicks,
    // a regular callback function 'sendAjax' will run, rather than an arrow function.
    // This is because we are using an arrow function in our AJAX code as well, and I don't
    // want to overcomplicate things at this stage by having too many arrow functions inside other arrow functions!

    document.getElementById("artist").addEventListener("keyup", sendAjax);

}

var b; // declare b to be updated later

function sendAjax() {
    // Read in the input from the two form fields
    var a = document.getElementById('artist').value;
    // read in where results will be shown
    b = document.getElementById('responseDiv');
    // When we get a response from the server, the callback function will run
    var xhr2 = new XMLHttpRequest();
    // Set up our AJAX connection variable (this is an object, for those of you who have done OO programming)

    // Set up the callback function. Here, the callback is an arrow function.
    xhr2.addEventListener("load", e => {

        //declare error msg div
        var errorMsg = document.getElementById("errors");
        if (e.target.status == 404) {
            errorMsg.innerHTML = "<p class='ml-3'>Something went wrong!</p>";
        } else if (e.target.status != 404) {
            errorMsg.innerHTML = `<p class='ml-3'>The status was ${e.target.status}</p>`;
        }


        var output = ""; // initialise output to blank text

        if (e.target.status == 200){
        var artistResults = JSON.parse(e.target.responseText);
        // Loop through each 
        artistResults.forEach(result => {
            // add the details of the current flight to the "output" variable
            output = output + `Artist: ${result.artist} Track: ${result.title}  <br /> `;
        });
        // Put the HTML output into the results div (up to you to do!)   
        b.innerHTML = output;
        console.table(artistResults);
        } else {
            artistResults = e.target.responseText;
        }


        
    });


    // Open the connection to a given remote URL.
    xhr2.open("GET", `https://edward2.solent.ac.uk/~wad1923/wad/artist/${a}`);

    // Send the request.
    xhr2.send();
}


