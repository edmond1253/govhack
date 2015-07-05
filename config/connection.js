// CREATING WEBSERVER AND QUERYING FROM DATABASE

// libraries stored in variables ( similar to include/import in most programming languages)
var http = require('http'); 
var mysql = require('mysql');

// object that holds connection details
var connection = mysql.createConnection({
	host : 'i4ctest.czutpqleq2ky.us-east-1.rds.amazonaws.com',
	user : 'i4ctest',
	password: '1234567890',
}); 

// connecting to the database
connection.connect();

// creating the webserver 
// general function - http.createServer(function(request, response){body}).listen(8888, '127.0.0.1');
// The IP Address : 127.0.0.1 is commonly referred to as the localhost server and the port can be anything I believe
http.createServer(function(req, res) {  
	console.log('Creating the http server');
	
	// Querying starts here
	var strQuery = "SELECT * FROM test.mytable";
	connection.query(strQuery, function(err, rows, fields) {
		if(!err) {
			console.log(rows);
			
			// res(response) is sort of like an object for outputting things in the web server, here we are writing the html
			res.writeHead(200, { 'Content-Type': 'application/json'});
			res.writeHead(200, {
				'Content-Type': 'text/html'
			});
			res.write('<!doctype html>\n<html lang="en">\n' + 
				'\n<meta charset="utf-8">\n<title>Test web page on node.js</title>\n' + 
				'<style type="text/css">* {font-family:arial, sans-serif;}</style>\n' + 
				'\n\n<h1>Testing Queries</h1>\n' + 
				'<div id="content"><p>div</p></div>' + '\n\n'
			);
			// closes output stream
			res.end(JSON.stringify(rows));
			res.end();
		}
		else {
			throw err;
		}
	});

}).listen(8888, '127.0.0.1');
console.log('Server running at http://127.0.0.1:8888');	

// close connection
//connection.end();
