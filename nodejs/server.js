var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);

io.on('connection', function(socket){
  console.log('a user connected');
  
  socket.on('disconnect', function(){
    console.log('user disconnected');
  });
  
   socket.on('chat', function(msg){
    io.emit('chat', msg);
  });
  
});


server.listen(3002, function(){
  console.log('listening on *:3002');
});



