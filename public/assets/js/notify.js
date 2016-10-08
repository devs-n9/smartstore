var socket = io.connect(location.origin + ':3000');

$('.send-notify').click(function(){
	console.log("click send");
	socket.emit('notify', {
        msg: $('.text-notify').val()
    });
});

socket.on('notifymsg', function(msg){
	console.log(msg);
});