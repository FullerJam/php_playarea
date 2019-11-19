responseDiv = document.getElementsByClassName("response"); //currently redundant

lati = 0;
longi = 0;
type = "";
desc = "";
pos = [];

/**
 * runs on page load
 */
function init() {

    if(navigator.geolocation)
    {
        navigator.geolocation.getCurrentPosition (

            gpspos=> {
                console.log(`Lat ${gpspos.coords.latitude} Lon ${gpspos.coords.longitude}`); // show on the console
                pos = [gpspos.coords.latitude, gpspos.coords.longitude];
                map.setView(pos, 14);
            },

            err=> {
                alert(`An error occurred: ${err.code}`);
            }

        );
    }
    else
    {
        alert("Sorry, geolocation not supported in this browser");
    }



    var map = L.map("map1");
    
    var attrib = "Map data copyright OpenStreetMap contributors, Open Database Licence";

    L.tileLayer
    ("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
    { attribution: attrib }).addTo(map);
    
    
 
    
    
    // circle radius value is measured in meters
    // var nam = L.circle([51.458057, -2.116074], { radius: 5000, fillColor: 'green', color: 'green', opacity: 0.5 }).addTo(map);
    
    /**
     * Map on click events
     */
    map.on("click", e => {
        lati = e.latlng.lat;
        longi = e.latlng.lng;
        console.log("user clicked at: Latitude " + lati + ", Longitude" + longi);
        
        markerPos = [lati, longi];
        console.log("Marker position added to variable");
        L.marker(markerPos).addTo(map); // adds marker on click

        type = prompt("Please enter type of this location (pub/park/school/station etc..)");
        desc = prompt("Please add any description");
        sendAjax(lati, longi, type, desc);
        return;
    });

};


/**
 * //Ajax
 * @param {*} lati // Latitude
 * @param {*} longi // Longitude
 * @param {*} type // Location category
 * @param {*} desc // Description of location
 */
function sendAjax(lati, longi, type, desc) {

    // read in where results will be shown
    // When we get a response from the server, the callback function will run
    var xhr2 = new XMLHttpRequest();
    // Set up our AJAX connection variable (this is an object, for those of you who have done OO programming)
    
    //add type and description to form data to keep url tidy
    var data = new FormData();
    data.append("type", type);
    data.append("desc", desc);
    // Set up the callback function. Here, the callback is an arrow function.
    xhr2.addEventListener("load", e => {

        //declare error msg div
        errorMsg = document.getElementById("response");

        if (e.target.status == 404) {
            errorMsg.innerHTML = "<p class='ml-3'>Something went wrong!</p>";
        } else if (e.target.status != 404) {
            errorMsg.innerHTML = `<p class='ml-3'>The status was ${e.target.status}</p>`;
        }


        if (e.target.status == 200) {
            var errorMsg = JSON.parse(e.target.responseText);
            // Put the HTML output into the response div
            errorMsg.innerHTML = "success";
        } 
        
    });
    
    
    // Open the connection to a given remote URL.
    xhr2.open("POST", `https://edward2.solent.ac.uk/~wad1923/wad/map/${lati}/${longi}`);
    
    // Send the request.
    xhr2.send(data);
}



// function init()
// {
//     var map = L.map ("map1");

//     var attrib="Map data copyright OpenStreetMap contributors, Open Database Licence";

//     L.tileLayer
//         ("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
//             { attribution: attrib } ).addTo(map);

//     map.setView([50.908, -1.4], 14);


//     // In Leaflet 1.0+
//      var solent = L.circle([50.9079, -1.4015], { radius:100}).addTo(map); 


//     // Saints stadium (football ground)
//     var saints = L.polygon ( [
//         [50.9063 , -1.3914 ] ,
//         [50.9063 , -1.3905 ] ,
//         [50.9053 , -1.3905 ] ,
//         [50.9053 , -1.3914 ]
//         ] ).addTo(map);

//     // Route to railway station
//     var routeToStation = L.polyline ( [
//         [50.9079, -1.4015] ,
//         [50.9071, -1.4015], 
//         [50.9069, -1.4047],
//         [50.9073, -1.4077],
//         [50.9081, -1.4134] 
//         ]).addTo(map);

//     solent.bindPopup("Solent University");
//     saints.bindPopup("Saints stadium");
//     routeToStation.bindPopup("Route to station");
// }
