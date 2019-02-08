var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);

io.on('connection', function(socket){
  console.log('a user connected');
  
  socket.on('disconnect', function(){
    console.log('user disconnected');
  });
  socket.on('chat', function(data_msg){
    io.emit('chat', data_msg);
  });
 
});
app.get('/', function (req, res) {
  res.sendFile(__dirname + '/index.html');
});
server.listen(3000, function(){
  console.log('listening on :3000');
});



