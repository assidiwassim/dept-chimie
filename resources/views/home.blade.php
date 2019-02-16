


@extends('layouts.layout-labo')

@section('content')


<!DOCTYPE html>
<html>
  <head>
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!---------------------------------------------------------------------------------------->

<!------ Include the above in your HEAD tag ---------->


  <link href="{{ asset("css/chat.css")}}" type="text/css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
<!---------------------------------------------------------------------------------------->
  </head>
  <body>

    
      
          
        
                <div class="inbox_msg ">
                  <div class="inbox_people">
                    <div class="headind_srch">
                      <div class="recent_heading">
                        <h4>Recent</h4>
                      </div>
                      <div class="srch_bar">
                        <div class="stylish-input-group">
                          <input type="text" class="search-bar" id="target"  placeholder="Search" >
                           </div>
                          
                      </div>
                    </div>
                    <div class="inbox_chat">

                      @foreach(DB::table('users')->where('role','<>',"admin")->where('id','<>',Auth::user()->id)->select()->get() as $user)

                      <div class="chat_list active_chat action_on_user" >
                        <input type="hidden" value="{{$user->id}}" >
                        <div class="chat_people">
                          <div class="chat_img"> <img src="/upload/logo/{{$user->logo}}" alt="sunil"> </div>
                          <div class="chat_ib">
                            <h5 class="username">{{$user->name}} </h5>
                            <p>Test, which is a new approach to have all solutions 
                              astrology under one roof.</p>
                          </div>
                        </div>
                      </div>
                      @endforeach
                     

                    </div>
                  </div>
                  <div class="mesgs">
                    <div class="msg_history" id="messages">
                      
                     

                      
              
                    </div>
                    <div class="type_msg">
                      <div class="input_msg_write">
                        <form id="form-chat">
                            <input type="text" class="write_msg" id="m" placeholder="Type a message" />
                            <button class="msg_send_btn" type="submit" ><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                        </form>
                     </div>
                    </div>
                  </div>
                </div>
                
               
         
            
            
         
    <!-------------------------------------------------------------------------
<ul id="messages">
  </ul>
  
    <form action="">
      <input id="m" autocomplete="off" /><button>Send</button>
    </form>
    
<script>

$.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

$(function () {
  
  var socket = io.connect('https://dept-chimie-chat.ml/');

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
------------------->
<script>

$.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

$(function () {


  
var from ;
var to;

$( ".action_on_user" ).click(function() {
 
    from = {{Auth::user()->id}} ;
    to = parseInt($(this).find( "input" ).val(), 10);

    var data_msg = {'_token': '{{csrf_token()}}',"from":from, "to":to}; 
        
                     
                      
                   

          $.ajax({
            type: 'POST',
            url: 'GetListMessage',
            data: data_msg,
            cache:false,
            success: function (data) {

              $('#messages div').remove();
              data.forEach(function(element) {
                
                if(element.from=={{Auth::user()->id}}){
                  console.log('mab3outh');
                  $('#messages').append('<div class="outgoing_msg"><div class="sent_msg"><p>'+element.text+'</p><span class="time_date"> 11:01 AM    |    Today</span> </div></div>');
                }
                else{
                 
                  console.log("ena lbe3eth");
                  $('#messages').append('<div class="incoming_msg"><div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div><div class="received_msg"><div class="received_withd_msg"><p>'+element.text+'</p><span class="time_date"> 11:01 </span></div></div></div>');
              
                }
               
              });
                console.log(data);
            },
            error: function (data, textStatus, errorThrown) {
               // console.log(data);
            },
          })
      
    });

 


var socket = io.connect('https://dept-chimie-chat.ml/');

socket.on('chat', function(data_msg){
     console.log(from,to)
     if((data_msg.from==from && data_msg.to==to) || (data_msg.from==to && data_msg.to==from) ){
          if(data_msg.from=={{Auth::user()->id}} ){
                      console.log('mab3outh');
                      $('#messages').append('<div class="outgoing_msg"><div class="sent_msg"><p>'+data_msg.text+'</p><span class="time_date"> 11:01 AM    |    Today</span> </div></div>');
          }else{
                      console.log("ena lbe3eth");
                      $('#messages').append('<div class="incoming_msg"><div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div><div class="received_msg"><div class="received_withd_msg"><p>'+data_msg.text+'</p><span class="time_date"> 11:01 </span></div></div></div>');
                  
          }
   }

                
                
});


$('#form-chat').submit(function(e){
  e.preventDefault();
  var msg =$('#m').val();
 //console.log(from,to,msg)

 var data_msg = {'_token': '{{csrf_token()}}',"from":from, "to":to,"text":msg}; 
      socket.emit('chat', data_msg);
      $('#m').val('');
      $.ajax({
        type: 'POST',
        url: 'AddMsg',
        data: data_msg,
        cache:false,
        success: function (data) {
          
           // console.log(data);
        },
        error: function (data, textStatus, errorThrown) {
           // console.log(data);
        },
      })
      return false;
});

$( "#target" ).keyup(function() {
var inpp = $(this).val();


$( ".chat_list" ).each(function( index ) {

  var str= $( this ).find( "h5.username" ).text().trim();
 if(str.indexOf(inpp)>=0){
  $( this ).show();
 }else{
  $( this ).hide();
 }

  })
});

})
</script>
</body>
</html>
@endsection