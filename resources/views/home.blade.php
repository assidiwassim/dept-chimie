<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.js"></script>
<ul id="messages">
  </ul>
  
    <form action="">
      <input id="m" autocomplete="off" /><button>Send</button>
    </form>
    
<script>

 

$(function () {
  var socket = io.connect('http://localhost:3002');
    $('form').submit(function(e){
      e.preventDefault(); 
      socket.emit('chat', $('#m').val());
      $('#m').val('');
      return false;
    });
    socket.on('chat', function(msg){
      $('#messages').append($('<li>').text(msg));
    });
  });

</script>
