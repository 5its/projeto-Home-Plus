<?php


require_once '../classes/Prestador.php';
require_once '../classes/Servico.php';
include_once '../classes/contrato.php';

$cod = $_SESSION['cod'];
$username = $_SESSION['username'];

if (!isset($cod) && !isset($username)) {
  header('location:./loginTrabalhador.php');
}

    try{
        $verPrestador = new visualizar();

        $verPrestador->setcodPrestador($_SESSION['cod']);

        $vr = $verPrestador->verPrestador($verPrestador);

        $vt = $verPrestador->verTelefone($verPrestador);

        while ($row = $vr->fetch(PDO::FETCH_BOTH)) {
          $name = $row[1];
          $cpf = $row[2];
          $email = $row[3];
          $dn = $row[4];
          $city = $row[5];
          $senha = $row[6];
        }


        while ($row = $vt->fetch(PDO::FETCH_BOTH)) {

         $nFone = $row[0];

        }

if (isset($_POST['mensagem'])) {
include("../classes/chatConexao.php");
date_default_timezone_set('America/Sao_Paulo');
$hora = date('H:i:s');
$mensagem = $_POST['mensagem'];
$sql = $pdo->query("INSERT INTO chat(nomePrestador, mensagem, hora, codPrestador) VALUES ('$name', '$mensagem', '$hora', '$cod')");

}
        
    }

    catch(Exception $e){
        echo '<prev>';
            print_r($e);
        echo '<prev>';
        echo $e->getMessage();
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
 <head>
  <meta charset="UTF-8">
<head>
	<title><?php echo "$username";?></title>

    <script 
      src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


	<link 
    rel="shortcut icon" 
    href="..\imagens\favicon.ico"/>

	<link 
    rel="stylesheet" 
    type="text/css" 
    href="..\css\bootstrap.css"/>

  <link 
    rel="stylesheet" 
    type="text/css" 
    href="..\css\chat.css"/>

    <link rel="stylesheet" type="text/css" href="../css/homeP.css">

    <style type="text/css">

        iframe{
          width: 130%;
          height: 93vh;
        }

        label.col-form-label{
          font-size: 14pt;
          font-family: initial;
          color: white;
          user-select: none;
        }

        div#list-profile{
          padding-top: 10%;
          background-color: #066EFD;
          width: 140%;
          padding-bottom: 10%;
        }

        .no-select{
          user-select: none;
        }

        .card-contrato{
          background-color: rgb(255, 115, 0);
          width: 100%;
          padding: 10px 20px 10px 10px;
          color: white;
          font-family: initial;
          font-size: 14pt;
          border: 1px solid rebeccapurple;
          box-shadow: 10px 10px 10px black;
          border-radius:1px 10px;
          display: block;
          margin-right: 10px;
          margin-top: 30px;
          margin-left: 20px;

        }

        .cancela{
          color: white;
          background-color: red;
          border: 1px black dashed;
          padding: 5px 10px;
          margin-right: 1%;
          margin-left: 70%;
        }


        .completa{
          color: white;
          background-color: green;
          border: 1px black dashed;
          padding: 5px 10px;

        }

      span#msg{
      position: fixed;
      top: 0; bottom: 0;
      left: 0; right: 0;
      margin: auto;
      width: 300px;
      height: 100px;
      padding: 2%;
      border: solid 1px #EBEDEF;
      background-color: rgb(013,110,253);
      color: #EBEDEF;
      font-size: 20px;
      text-align: center;
      
        }

        p#pop{
        position: fixed;
        top: 0; bottom: 0;
        left: 0; right: 0;
        margin: auto;
        width: 300px;
        height: 300px;
        padding: 2%;
        border: solid 1px #EBEDEF;
        background-color: rgb(078,079,144);
        color: #EBEDEF;
        font-size: 20px;
        text-align: center;
        }

        #history{
          color: white;
          background-color: darkviolet;
          border: 1px black dashed;
          padding: 5px 10px;

        }

        #voltar{
          color: white;
          background-color: darkviolet;
          border: 1px black dashed;
          padding: 5px 10px;
          display: none;
        }

    </style>

</head>
<body>

<!-- MID -->
<div class="container" style="margin-left: 0px;">
    <div class="row">

        <div id="barra" class="shadow mh-100 d-flex flex-column p-3 h-100" style="width: 280px; "    >
            <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
              <img src="..\imagens\Home+3.png" height="50vh">
              <span class="fs-4"  style="color:white;">
                <?php echo "  $username"?>
                </span>
              </a>
          <hr>
          <ul id="nav" class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
              <a class="nav-link active list-group-item list-group-item-action active" id="linkdanav" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="home">
                Home
              </a>    
            </li>
            
            <li>
              <a class="nav-link link-dark list-group-item list-group-item-action" id="linkdanav" data-bs-toggle="list" href="#list-messages" role="tab" aria-controls="messages">
                Mensagens
              </a>
            </li>

            <li>
              <a class=" nav-link link-dark list-group-item list-group-item-action" id="linkdanav" data-bs-toggle="list" href="#list-profile" role="tab" aria-controls="profile">
                Configurações
              </a>
            </li>
              <br>    
            <input id="btnsair" type="button" value="Sair" class="btn" onclick="sair()">
          </ul>
        </div>


  <div class="col-8">
    <div class="tab-content" id="nav-tabContent" style="margin-top: 5%; margin-left: 5%">

      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">

        <button id="history">Historico</button>
        <button id="voltar">Voltar</button>


        <div id="Resultado"></div>

        
      <div id="div_contratos">          
        
        <?php 



        try {

          $contratos = new contrato();

          $contratos->setcodPrestador($_SESSION['cod']);

          $verContratos = $contratos->visualizar($contratos);

          $tabela = $verContratos->rowCount();

          if ($tabela >= 1) {
            

            while ($row = $verContratos->fetch(PDO::FETCH_BOTH)) {

              $d = $row['dataContrato'];

              $codC = $row['codCliente'];

              $verCliente = new cliente();

              $verCliente->setcodCliente($codC);

              $verCl = $verCliente->verName($verCliente);


              $date = date_create($d);

              $conclusao = date_format($date, 'd/m/Y');




            echo "<div class='card-contrato'>";
            echo "<p>Nome: ".$verCl. " ".$row['codContrato']."</p>";
            echo "<hr>";
            echo "<p>Conclusão: ".$conclusao." </p>";
            echo "<hr>";
            echo "<p>status: ".$row['descStatus']."</p>";
            echo "<button class='cancela' value='".$row['codContrato']."'>Cancelar</button>";
            echo "<button class='completa' value='".$row['codContrato']."'>Conclusão</button>";
            echo "</div>";

            }

          } else {
            echo "<span id='msg'>Não há serviços a concluir.</span>";
          }
          

          
        }catch (PDOException $e) {
         echo "ERRO: ". $e -> getMessage();
        }



         ?>

      </div>

      <div id="div_historico">

                <?php 



        try {

          $contratos = new contrato();

          $contratos->setcodPrestador($_SESSION['cod']);

          $verContratos = $contratos->vH($contratos);

          $tabela = $verContratos->rowCount();

          if ($tabela >= 1) {
            

            while ($row = $verContratos->fetch(PDO::FETCH_BOTH)) {

              $d = $row['dataContrato'];

              $codC = $row['codCliente'];

              $verCliente = new cliente();

              $verCliente->setcodCliente($codC);

              $verCl = $verCliente->verName($verCliente);


              $date = date_create($d);

              $conclusao = date_format($date, 'd/m/Y');




            echo "<div class='card-contrato'>";
            echo "<p>Nome: ".$verCl. " ".$row['codContrato']."</p>";
            echo "<hr>";
            echo "<p>Conclusão: ".$conclusao." </p>";
            echo "<hr>";
            echo "<p>status: ".$row['descStatus']."</p>";
            echo "<button class='cancela' value='".$row['codContrato']."'>Cancelar</button>";
            echo "<button class='completa' value='".$row['codContrato']."'>Conclusão</button>";
            echo "</div>";

            }

          }
          

          
        }catch (PDOException $e) {
         echo "ERRO: ". $e -> getMessage();
        }



         ?>
        

      </div>


      </div>




      <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">

      <div id="divPerfil" class="container-md">


        
        <?php  

        try {
        
$eName = '<div class="row mb-3">
<label for="name" class="col-sm-2 col-form-label">Nome: </label>
<div class="col-sm-10">
<input type="text" class="form-control no-select" value="'.$name.'" id="name" disabled>
</div>
</div>';

$eCpf = '<div class="row mb-3">
<label for="cpf" class="col-sm-2 col-form-label">CPF: </label>
<div class="col-sm-10">
<input type="text" class="form-control no-select" value="'.$cpf[0].$cpf[1].$cpf[2].'.'.$cpf[3].$cpf[4].$cpf[5].'.'.$cpf[6].$cpf[7].$cpf[8].'-'.$cpf[9].$cpf[10].'" id="cpf" disabled>
</div>
</div>';

$eEmail = '<div class="row mb-3">
<label for="email" class="col-sm-2 col-form-label">E-mail: </label>
<div class="col-sm-10">
<input type="email" class="form-control no-select" value="'.$email.'" id="email" disabled>
</div>
</div>';
$date = '<div class="row mb-3">
<label for="dataNasc" class="col-sm-2 col-form-label">Nascimento: </label>
<div class="col-sm-10">
<input type="date" class="form-control no-select" value="'.$dn.'" id="dataNasc" disabled>
</div>
</div>';

$eCity = '<div class="row mb-3">
<label for="cidade" class="col-sm-2 col-form-label">Cidade: </label>
<div class="col-sm-10">
<input type="text" class="form-control no-select" value="'.$city.'" id="cidade" disabled>
</div>
</div>';

$eSenha = '<div class="row mb-3">
<label for="senha" class="col-sm-2 col-form-label">Senha: </label>
<div class="col-sm-10">
<input type="password" class="form-control no-select" value="'.$senha.'" id="senha" disabled>
</div>
</div>';

$enFone = '<div class="row mb-3">
<label for="telefone" class="col-sm-2 col-form-label">Telefone: </label>
<div class="col-sm-10">
<input type="text" class="form-control no-select" value="'.$nFone.'" id="telefone" disabled>
</div>
</div>';
        
        $stmt = null;   
        
        
        echo "$eName $eCpf $eEmail $date $eCity $eSenha $enFone";
          
        }catch (PDOException $e) {
         echo "ERRO: ". $e -> getMessage();
        }
        
        ?>

        <form method="POST">


     <input  type='submit' class='btn btn-danger' name='excluir' id='excluir' value='Excluir'>

     </form>

      </div>

      </div>

      <div class="tab-pane fade msg" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">

                <!-- Começo do chat -->

        <div id="chat" class="container-md">

           <iframe src="./chatPrestador/index.php" width="100%" height="93vh"></iframe>

        </div>


        <!-- Fim do chat -->

          
      </div>

    </div>
  </div>
</div>
</div>


<!-- BOT -->

<script type="text/javascript" src="cancelar.js"></script>

<script type="text/javascript" src="concluir.js"></script>

<script   
  type="text/javascript" 
  src="../js/bootstrap.js"></script>

<script type="text/javascript">
  function sair() {
    window.location.href="./dest.php";
  }
</script>

<script type="text/javascript">

  $('#div_historico').hide();

  $('.cancela').click(function(){

    var value = $(this).val();

    cancelar(value);
    
  });

  $('.completa').click(function(){

    var value = $(this).val();

    concluir(value);
  });

  $('#history').click(function() {

      $('#div_contratos').hide();

      $('#div_historico').show();

      $(this).hide();

      $('#voltar').show();

  });

  $('#voltar').click(function() {

      $('#div_contratos').show();

      $('#div_historico').hide();

      $(this).hide();

      $('#history').show();

  });


  

</script>
  

</body>
</html>