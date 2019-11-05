responseDiv = document.getElementsByClassName("response");


function init()
{
    if(navigator.geolocation)
    {
        navigator.geolocation.getCurrentPosition (

            gpspos=> {
                console.log(`Lat ${gpspos.coords.latitude} Lon ${gpspos.coords.longitude}`); // show on the console
                responseDiv.textContent("")
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
}