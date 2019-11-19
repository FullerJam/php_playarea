function sendAjax(){
    // initiate new XMLHttpRequest object and assign to a variable
    var xhr2 = new XMLHttpRequest();    
    //identify form so it cant be used with the form data object
    let form = document.getElementById("search_form");
    var data = new FormData(form);
    // Set up a callback function. Here, the callback is an arrow function.
    xhr2.addEventListener("load", e => {

        //declare error msg div
        responseDiv = document.getElementById("response");

        if (e.target.status == 404) {
            responseDiv.innerHTML = "<p class='ml-3'>Something went wrong!</p>";
        } else if (e.target.status != 404) {
            responseDiv.innerHTML = `<p class='ml-3'>The status was ${e.target.status}</p>`;
        } else if (e.target.status == 200) {
            var responseDiv = JSON.parse(e.target.responseText);
            //returns values if request succeeded 
        } 
    });
    //prevent submits default action
    form.addEventListener("submit", function(event){
        event.preventDefault();
        sendAjax();
    });
    // Open the connection to a given remote URL.
    xhr2.open('GET', 'script.php'); 
    // Send the request.
    xhr2.send(data);
}