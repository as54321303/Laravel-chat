<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Real Time Chat </title>
  <script src="{{asset('js/app.js')}}" crossorigin="anonymous"></script>
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <link href="//netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" />
 
</head>

<body>
    <div class="container mt-4">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2>Real Time Chat</h2>
                <input type="hidden" id="username" value="{{@request()->username}}">
            </div>
            <div class="panel-body">
              Logged In as  : {{@request()->username}}
            <div id="messages"></div>
            
            <form   id="chatbox" action="{{url('send-notification')}}" >
              <div class="form-group mt-5">
                <label>Message</label>
                <input type="text" id='text' name="message" value="" class="form-control" />
              </div>

              <div class="form-group">
                <button class="btn btn-primary">Send</button>
              </div>
            </form>
            
                
            </div>
        </div>
    </div>
</body>
<script>

   
    $(function() {
      Echo.channel('my-notifications')
      .listen('SendNotification', (e) => {
        console.log(e.username+":"+e.message);
          $('#messages').append("<br>"+"<b>"+e.username+"</b>"+":"+e.message);
        // $("#messages").append("<br>"+JSON.stringify(e));
      });

      $("#chatbox").on("submit", function(e) {
          e.preventDefault();
          var action = $(this).attr("action");
          var message = $("#text").val();
          var username=$('#username').val();
         
            // $.get(
            //     action+"?message="+message+"?username="+username,
            //     function(data) {
            //     $("#text").val('');
                 
            // }) 

            $.ajax({
                url:action,
                type:"GET",
                data:{
                    'username':username,
                    'message':message
                },

                success:function(data){
                    $('#text').val('');
                }


            });
          
          return false;

        });
    
    });

     
  </script>
</html>