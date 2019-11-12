const express = require('express');
// song.js
const song = express.Router();

song.get('/all', (req,res)=&gr; {
    // code to return all songs
});

song.get('/id/:id', (req,res)=> {
    // code to find the song with the given ID
});

module.exports = song; // export the module for external use