
<!DOCTYPE html>
<html>
  <head>
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


  </head>
  <body>
<ul id="messages">
  </ul>
  
    <form action=""></form>
      <input id="m" autocomplete="off" /><button>Send</button>
    </form>
    
<script>

$.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

$(function () {
  
  var socket = io.connect('http://dept-chimie-chat.ml/');

    socket.on('chat', function(data_msg){
      console.log(data_msg);
      $('#messages').append($('<li>').text(data_msg.text));
    });

    $('form').submit(function(e){
      e.preventDefault();
      var msg =$('#m').val();
     
      var data_msg = {'_token': '{{csrf_token()}}',"from":22, "to":33,"text":msg}; 
      socket.emit('chat', data_msg);
      $('#m').val('');
      $.ajax({
        type: 'POST',
        url: 'AddMsg',
        data: data_msg,
        cache:false,
        success: function (data) {
            console.log(data);
        },
        error: function (data, textStatus, errorThrown) {
            console.log(data);
        },
      })

      return false;
    });

   

  });

</script>
</body>
</html>