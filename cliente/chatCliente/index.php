<?php

include('chat.php');

session_start();


?>

<html>  
    <head>  
        <title>Chat Application using PHP Ajax Jquery</title>  

          <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


        <style type="text/css">

          .title td{
            background-color: rgb(255, 115, 0);
            color: white;
            font-family: arial;
            font-size: 18pt;
            text-shadow: black 3px 3px 5px;
          }

          .msg{
            width: 100%;
          }

          .msg h1{
            font-size: 30pt;
            font-family: initial;
            text-shadow: gray 3px 3px 6px;
            color: rgb(008, 118, 253);
          }

          .chat{
            color: white;
            background-color: green;
          }

          .chat:hover{
            transition: 1s;
            color: black;
            background-color:#A6E22C;
          }

          .off{
            color: white;
            background-color: red;
            transform: none;
          }

          .off:hover{
            color: white;
            background-color: red;
            cursor: auto;
          }

          .on{
            color: white;
            background-color: blue;
            transform: none;
          }

          .on:hover{
            color: white;
            background-color: blue;
            cursor: auto;
          }

          body{
            background-image: linear-gradient( rgb(056, 217, 238), rgb(001,105,255), rgb(056, 217, 238) );
            background-repeat: no-repeat;
            background-size: cover;
          }

          




        </style>

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>  
    <body>
      
    <link rel="stylesheet" type="text/css" href="../css/chat2.css">

        <div class="container">
   
   <div class="msg">
    <h1 align="center">Conversas</h1>
    <br>
    <div id="user_details"></div>
    <div id="user_model_details"></div>
   </div>
  </div>
    </body>  
</html>  




<script>  
$(document).ready(function(){

 fetch_user();

 setInterval(function(){
  update_last_activity();
  fetch_user();
  update_chat_history_data();
 }, 5000);

 function fetch_user()
 {
  $.ajax({
   url:"fetch_user.php",
   method:"POST",
   success:function(data){
    $('#user_details').html(data);
   }
  })
 }

 function update_last_activity()
 {
  $.ajax({
   url:"update_last_activity.php",
   success:function()
   {

   }
  })
 }

 function make_chat_dialog_box(to_user_id, to_user_name)
 {
  var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="Chat com '+to_user_name+'">';
  modal_content += '<div style="border-radius:3px; height:310px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
  modal_content += fetch_user_chat_history(to_user_id);
  modal_content += '</div>';
  modal_content += '<div class="form-group">';
  modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control"></textarea>';
  modal_content += '</div><div class="form-group" align="right">';
  modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat" style="color:white; background: green; border: 1px solid green;">Enviar</button></div></div>';
  $('#user_model_details').html(modal_content);
 }

 $(document).on('click', '.start_chat', function(){
  var to_user_id = $(this).data('touserid');
  var to_user_name = $(this).data('tousername');
  make_chat_dialog_box(to_user_id, to_user_name);
  $("#user_dialog_"+to_user_id).dialog({
   autoOpen:false,
   width:400
  });
  $('#user_dialog_'+to_user_id).dialog('open');
 });

 $(document).on('click', '.send_chat', function(){
  var to_user_id = $(this).attr('id');
  var chat_message = $('#chat_message_'+to_user_id).val();
  $.ajax({
   url:"insert_chat.php",
   method:"POST",
   data:{to_user_id:to_user_id, chat_message:chat_message},
   success:function(data)
   {
    $('#chat_message_'+to_user_id).val('');
    $('#chat_history_'+to_user_id).html(data);
   }
  })
 });

 function fetch_user_chat_history(to_user_id)
 {
  $.ajax({
   url:"fetch_user_chat_history.php",
   method:"POST",
   data:{to_user_id:to_user_id},
   success:function(data){
    $('#chat_history_'+to_user_id).html(data);
   }
  })
 }

 function update_chat_history_data()
 {
  $('.chat_history').each(function(){
   var to_user_id = $(this).data('touserid');
   fetch_user_chat_history(to_user_id);
  });
 }

 $(document).on('click', '.ui-button-icon', function(){
  $('.user_dialog').dialog('destroy').remove();
 });
 
});  
</script>
