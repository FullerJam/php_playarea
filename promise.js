function ajaxPromise(url) {
    return new Promise(

        (resolve, reject) => { 
            var xhr2 = new XMLHttpRequest();
            xhr2.open('GET', url);
            xhr2.addEventListener("load", (e)=> 
            {              
                if(e.target.status>=400 && e.target.status<=599)
                {
                    // pass the HTTP code to the reject function
                    reject(e.target.status);  
                } 
                else 
                {
                    // pass the response text to resolve function
                    resolve(e.target.responseText);
                }
            } );
            xhr2.send();
        }
    );
}

ajaxPromise(`https://edward2.solent.ac.uk/~wad1923/wad/all_songs`).then(JSON.parse).then(ajaxSuccess).catch(handleError);

function ajaxSuccess(responseText) 
{
    var data = (responseText);
    showJsonResults(data);
}

function handleError(error) 
{
    console.log('Error: ' + error);
}

function showJsonResults(data)
{
    //data returns as json from the web service
    var html = ``;
    
    data.forEach ( data =>  
    
        {
            html = html + `Artist - ${data.artist} <br />`;
        });
        
    document.getElementById("results").innerHTML = html; 
}    