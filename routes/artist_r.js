const express = require('express');
// song.js
const artist = express.Router();

//imports mysql connection module
const con = require('../SQL_con_module_wad');



/**
 * code to return all artists
 */
artist.get('/all', (req, res) => {
    con.query(`SELECT * FROM wadsongs WHERE artist=?`,
        [artist], (error, results, fields) => {
            if (error) {
                console.log(`Error with mysql statement: details: ${JSON.stringify(error)}`);
            } else {
                let resultText = "";
                results.forEach(result => {
                    resultText+=`Artist name : ${result.artist}` 
                });
                console.log(resultText);
            }
        })
});

artist.get('/id/:id', (req, res) => {
    // code to find the artist with the given ID
});

module.exports = artist; // export the module for external use






