// File - mysqlconn.js
const mysql = require('mysql');

const con = mysql.createConnection({
    host: 'localhost',
    user: 'dftitutorials',
    database: 'dftitutorials',
    password: 'dftitutorials'
});

con.connect(err => {
    if (err) {
        console.log(err);
        process.exit(1); // exit the server
    } else {
        console.log('connected to mysql server');
    }
});

module.exports = con;