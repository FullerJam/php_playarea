const wsock = require('ws');
const server = new wsock.Server({port:8023});

// When the server receives a new connection...
server.on('connection', clientConn=> {
    console.log('New connection');

    // Listen for messages from this connection...
    clientConn.on('message', msg=> {
        console.log(`Received a message: ${msg}`);

        server.clients.forEach ( curClient=> {
            curClient.send(msg);
        });
    });
});


//sets node path on putty
//  source ~/.bashrc
//  echo $NODE_PATH
