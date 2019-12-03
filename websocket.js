// const wsock = require('ws');
// //server
function init() {
    var ws = new WebSocket(`ws://ephp.solent.ac.uk:8023`);

    // When the server receives a new connection...
    ws.onopen = () => {
        //Handle the web socket being opened...
        console.log('Websocket was opened!');
        //ws.send('ephp001'); // demo
    }

    ws.onmessage = (e) => {
        var JSONObject = JSON.parse(e.data);
        console.log('Websocket sent back... ' + e.data);

        // [ { user: Tim}, { message: Hello} ]
        // { user: "Tim", message: "Hello" }
        document.getElementById('message').innerHTML += `${JSONObject.user}: ${JSONObject.message} <br />`;
    }

    ws.onerror = e => {
        alert('Error with websocket communication: is the server running?');
    }


    button = document.getElementById("send").addEventListener('click', e => {
        const msg = document.getElementById('text_input').value;
        const username = document.getElementById('username').value;

        const obj = { 
            user: username,
            message: msg
        }

        const json = JSON.stringify(obj);
        ws.send(json);
    })
};