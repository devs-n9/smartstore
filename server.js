var http = require('http').Server();
var io = require('socket.io')(http);
var mongoose = require('mongoose');

var configDB = require('./database.js');
mongoose.connect(configDB.url);

io.on('connection', function (socket) {
    console.log('a user connected: ', socket.id);
	
	socket.on('notify', function(msg){
		console.log("admin send notify", msg);
		socket.broadcast.emit('notifymsg', msg);
	});
	
});


http.listen(3000, function () {
    console.log('listening on *:3000');
});