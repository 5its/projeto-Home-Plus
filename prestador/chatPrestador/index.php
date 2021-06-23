<?php

include('chat.php');
include_once '../../classes/contrato.php';
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
            color: white;
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

          #form-contrato{
            position: fixed;
            top: 0; bottom: 0;
            left: 0; right: 0;
            margin: auto;
            width: 90%;
            height: 90%;
            padding: 15px;
            border: solid 1px #EBEDEF;
            background-color: rgb(237,098,006);
            color: #EBEDEF;
            font-size: 20px;
            box-shadow:20px 20px 20px black;
          }

          .dados_contrato{
            background-color: rgb(055, 216, 238);
            padding: 10px 10px 10px 10px;
            color: black;
          }

          .pop_contrato{
            position: fixed;
            top: 0; bottom: 0;
            left: 0; right: 0;
            margin: auto;
            width: 100%;
            height: 300vh;
            background-color: rgba(010, 123, 251 , 90%);
            color: #EBEDEF;
            font-size: 20px;
            display: none;
          }

          .Select_servico{
            padding: 10px 20px;
            border-radius: 10px 10px 0px 0px;
            border: 1px dashed blueviolet;
          }

          .Select_servico optgroup{
              border: 1px dashed black;
              border-radius: 0px 0px 10px 10px;
          }

          input#data_contrato{
            padding: 5px 10px;
            border: 1px dashed blueviolet;
            border-radius: 5px;
           }

           #create_contrato{
            background-color: green;
            padding: 10px 20px;
            border-radius: 5px;
            border: 0px solid black;
            color: white;
           }




        </style>

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>  
    <body>  
        <div class="container">
   
   <div class="msg">
    <h1 align="center" style="padding-top: 2%;
                              padding-top: 2%;"> Conversas </h1>
    <br>
    <div id="user_details"></div>
    <div id="user_model_details"></div>

    <div class="pop_contrato" id='pop_contrato'>

    <div id="form-contrato">

      <div class="form" id="form"> 

      <div class="close">

      <button id="close">

        <svg 
          xmlns="./../img/x.svg" 
          width="14" 
          height="14" 
          fill="currentColor" 
          class="bi bi-x" 
          viewBox="0 0 14 14">
              <path 
                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
        </svg>

      </button>

      </div>

      <h1 id="popTitle">Confirme os dados para realizar o contrato</h1>

      <div class="dados_contrato">
        <p id="p_user_name"></p>
        <hr>
        <p id="p_cliente_name"></p>
        <hr>
        <select id="Select_servico" class="Select_servico " >
            <option value="0" selected disabled hidden>Selecione o serviço
            </option>

            <optgroup>
            
            <?php 

$servico = new contrato();

$servico->setcodPrestador($_SESSION['cod']);

$verservico = $servico->ver($servico);



while ($row = $verservico->fetch(PDO::FETCH_BOTH)) {
          echo "<option value='".$row['codServicoPrestado']."'>".$row['nomeServico']."</option>";
}

             ?>

             </optgroup>
        </select>

        <hr>
        <input type="date" name="data" id="data_contrato">
        <hr>

        <button id="create_contrato">Confirmar</button>
        
      </div>


      
        

    </div>
  </div>

  </div>

      
    </div>

   </div>
  </div>
    </body>  
</html>  


<script>  
 $(document).on('click', ' #contrato', function(){

  var cliente_name = $(this).attr('value');

  $('#pop_contrato').show();

  $('#p_cliente_name').html("Nome Cliente: " +cliente_name);

  var name_user = "<?php echo($_SESSION['username']) ?>";
  
  var codCliente = $(this).data('iduser');

  $('#p_cliente_name').data('iduser',codCliente);

  $('#p_user_name').html("Prestador: " + name_user);


 });

 $(document).on('click', '#close', function(){
    $('#pop_contrato').hide();
 });

// 
// 

$('#create_contrato').on('click', function(){

var valorSelect = $('#Select_servico option:selected').val();

var data_contrato = $('#data_contrato').val();

var codC = $('#p_cliente_name').data('iduser');

  if (valorSelect = 0) 
  {
    alert("Selecione um serviço para realizar o contrato");
  }else{
  $.ajax({
   url:"create_contrato.php",
   method:"POST",
   data:{data_contrato:data_contrato, codCliente:codC, servicoPrestador:valorSelect},
   success:function()
   {
      location.reload();
   }
  })
  }

 });


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
