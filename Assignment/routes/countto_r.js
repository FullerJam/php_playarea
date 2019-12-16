const express = require('express');
const app = express();


app.get('/countTo/:ntimes', (req,res)=> {
    let response = ''; // let - locally-scoped variable which can be changed
    for(var count=1; count<=req.params.ntimes; count++) {
        response += `${count}<br />`;
    }
    res.send(response);
});


app.listen(3003);