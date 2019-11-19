const express = require('express');
const bodyParser = require('body-parser');
const app = express();
//imports mysql connection module
const con = require('./SQL_con_module_wad');
const mongoose = require('mongoose');

const Student = mongoose.model('student', new mongoose.Schema(
    {
        name: String,
        course: String,
        mark: Number
    }));

// Import our song router module which we created above

const artistRouter = require('./routes/artist_r')
// Tell the app to use songRouter for all routes beginning with /songs
// As we are using "use()", the router is acting as a middleware.
app.use('/artist', artistRouter);

// Connect to a mongoose database named 'test' on the local machine (localhost)
mongoose.connect('mongodb://localhost/test');

/**
 * LEARNING BELOW & app.listen function
 */

/**
 * all express routes go inside mongoose callback
 */
mongoose.connection.once('open', () => {
    // do your queries in this callback...
    app.get('/allStudents', (req, res) => {
    // Run a callback as soon as the connection is open
        Student.find(
            (err,result)=> {
                if(err) {
                    console.log(`Error: ${err}`);
                } else {
                    res.json(result);
                }
            });
    });


/**
 * Count
 */
app.get('/countTo/:ntimes', (req, res) => {
    let response = '';
    for (let count = 1; count <= req.params.ntimes; count++) {
        response += `${count}<br />`;
    }
    res.send(response);
});



/**
 * body parser for post data - body parser can interpret the request body and extract the POST data from it.
 */
app.use(bodyParser.urlencoded({ extended: true }));

/**
 * 
 */
app.post('/addSong', (req, res) => {
    res.send(`Adding song ${req.body.title} by ${req.body.artist}.`);
    // if you want to send json just 'res.json'
});
//req.body.<fieldname>
// equivalent of $_POST in php

// **to return status codes**
//res.status(400).json({'error': 'you did not provide a search query'});

//source ~/.bashrc //tells putty where to look for node modules folder



//listen for requests on port ####
app.listen(3023);

 //CORS cross origin request sharing 

});