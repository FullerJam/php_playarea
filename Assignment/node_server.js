const http = require("http");

const server = http.createServer(
    (request, response) =>
    {
        response.write(`Requested with a method of ${request.method}`);
        response.write(`         node server is running`);
        response.end();
    }
);

server.listen(3003);

//http node module documentation - https://nodejs.org/api/http.html

// user - node1903
// pass ukouseid

//The mongo database is also called 'node1903'.