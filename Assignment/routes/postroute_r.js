const express = require('express');
const bodyParser = require('body-parser');

const app = express();

app.use(bodyParser.urlencoded({extended:true}));

app.post('/addSong', (req,res) => {
    res.send(`Adding song ${req.body.title} by ${req.body.artist}.`);
});

app.listen(3003);