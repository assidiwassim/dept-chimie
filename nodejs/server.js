var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);



app.get('/', function (req, res) {
  res.sendFile(__dirname + '/index.html');
});

io.on('connection', function(socket){
  console.log('a user connected');
  
  socket.on('disconnect', function(){
    console.log('user disconnected');
  });
  socket.on('chat', function(data_msg){
    io.emit('chat', data_msg);
  });
 
});

server.listen(3002, function(){
  console.log('listening on :3002');
});



