const mongoose = require('mongoose');

// Connect to a database named 'test' on the local machine (localhost)
mongoose.connect('mongodb://localhost/wadlib');

// Run a callback as soon as the connection is open. 'once' only runs function once
mongoose.connection.once('open', () => {
    console.log('connected to mongodb server');
}).on('error', ()=>{ //.on will run the callback function anytime their is an error
    console.log(`Connection error: ${error}`)
});


