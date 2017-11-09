var express = require('express');
var app = express();
var server = app.listen(3000);
var io = require('socket.io').listen(server);
// io.connect('http://localhost:3000')


app.get('/', function(req, res){
	res.setHeader('Access-Control-Allow-Origin', '*');
    res.setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, PATCH, DELETE'); // If needed
    res.setHeader('Access-Control-Allow-Headers', 'X-Requested-With,contenttype'); // If needed
    res.setHeader('Access-Control-Allow-Credentials', true); // If needed
	res.send('<h1>Hello world</h1>');
});
io.on('connection',function(socket){
	console.log('a user connected');
});

server.listen(3000, function(){
  console.log('listening on *:3000');
});