const express = require('express');
const bodyParser = require('body-parser');
const app = express();
//imports mysql connection module
const con = require('./SQL_con_module_wad');


// Import our song router module which we created above

const artistRouter = require('./routes/artist_r')
// Tell the app to use songRouter for all routes beginning with /songs
// As we are using "use()", the router is acting as a middleware.
app.use('/artist', artistRouter);













/**
 * LEARNING BELOW & app.listen function
 */

/**
 * Hello World
 */
app.get('/hello', (req,res)=> {
    res.send('Hello World from Express!');
});

/**
 * Count
 */
app.get('/countTo/:ntimes', (req,res)=> {
    let response = '';
    for(let count=1; count<=req.params.ntimes; count++) {
        response += `${count}<br />`;
    }
    res.send(response);
});



/**
 * body parser for post data - body parser can interpret the request body and extract the POST data from it.
 */
app.use(bodyParser.urlencoded({extended:true}));

/**
 * 
 */
app.post('/addSong', (req,res) => {
    res.send(`Adding song ${req.body.title} by ${req.body.artist}.`);
    // if you want to send json just 'res.json'
});
//req.body.<fieldname>
// equivalent of $_POST in php

// **to return status codes**
//res.status(400).json({'error': 'you did not provide a search query'});





//listen for requests on port ####
app.listen(3023);

 //CORS cross origin request sharing 

