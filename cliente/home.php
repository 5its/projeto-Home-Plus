<?php 
session_start();

include_once '../classes/Cliente.php';

$codCli = $_SESSION['codCliente'];
$usernameCli = $_SESSION['usernameCliente'];

if (!isset($codCli) && !isset($usernameCli)) {
  header('location:./loginCliente.php');
}

  try {

    $verCli = new visualizar();

    $verCli->setcodCliente($_SESSION['codCliente']);

    $verCliente = $verCli->visuaCliente($verCli);

    $verTeleCliente = $verCli->visuaTelefone($verCli);


    while ($row = $verCliente->fetch(PDO::FETCH_BOTH)) {

      $nameCli = $row['nomeCliente']; 

      $cpfCli = $row['cpfCliente'];

      $emailCli = $row['emailCliente'];

      $dnCli = $row['datanascCliente'];

      $cityCli = $row['bairroCliente'];

      $senhaCli = $row['senhaCliente'];

      $generoCli = $row['genero'];

      $numCaCliente = $row['numerocasaCliente'];

      $logaCli = $row['logradouroCliente'];
    }


    while ($row = $verTeleCliente->fetch(PDO::FETCH_BOTH)) {
      $nFoneClie = $row['numFoneCliente'];
    }
  
  }catch(Exception $e){
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
 	<title><?php echo $usernameCli; ?></title>
 </head>

 <link rel="shortcut icon" href="..\imagens\favicon.ico">

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
 	
 	input#txtpesquisa{
 	border: 1px solid rgb(204, 154, 000);
   	font-family: initial;
 	}

 	#btnPesquisar{
 	border: 1px solid rgb(204, 154, 000);
   	font-family: initial;
   	transition: 0.3s;
 	}

 	#btnPesquisar:hover{
 		background-color: #01DDFF;
 		color: black;
 	}

 	.msgajax{
 		background-color: #57e057;
 		color: #fff;
 		padding: 10px;
 		margin: 0px 15px 20px 15px;
 		font-weight: 500;
 	}

  #linkdanav{
    color: black;
}

#linkdanav:hover{
    background-color: rgb(255, 115, 0);
    color: white;
}

 </style>
 <body>

 	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">

  <link rel="stylesheet" type="text/css" href="../css/home2.css">


<!-- MID -->
<div class="container">
    <div class="row" style="color:rgb(255, 115, 0);">

        <div id="barra" class="shadow mh-100 d-flex flex-column p-3 h-100" style="width: 280px;">
            <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
              <img src="..\imagens\Home+3.png" height="50vh">
              <span class="fs-4" style="color:white;">
                <?php echo "   $usernameCli" ?>
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
              <a class="nav-link list-group-item list-group-item-action" id="linkdanav" data-bs-toggle="list" href="#list-profile" role="tab" aria-controls="profile">
                Perfil
              </a>
            </li>
            <li>
                <a class="nav-link list-group-item list-group-item-action" id="linkdanav" data-bs-toggle="list" href="#list-messages" role="tab" aria-controls="messages">
                  Chat
                </a>
            </li>
            <li>
              <a class="nav-link list-group-item list-group-item-action" id="linkdanav" data-bs-toggle="list" href="#list-settings" role="tab" aria-controls="settings">
                Configurações
              </a>
            </li>
              <br>    
            <!-- <li style="margin-top: 120%">
              <p class="nav-link link-dark" onclick="sair()" style="color:red;">
                Sair
              </p>
            </li> -->
            <input id="btnsair" type="button" value="Sair" class="btn" onclick="sair()">
          </ul>
        </div>


  <div class="col-8">
    <div class="tab-content" id="nav-tabContent" style="margin-top: 5%; margin-left: 5%">

      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">

      	<div class="row g-3">

      		<section>
      			<div class="msg" style="display: none;">
      				<p class="msgajax"></p>
      			</div>
      		</section>

  			<div class="col-sm-7">

  				<input 
  					type="text" 
  					class="form-control" 
  					name="txtpesquisa" 
  					id="txtpesquisa"
  					placeholder="Busque por um serviço"
  				/>

  			</div>

  			<div class="col-sm">

  				<input 
  				type="button" 
  				name="btnPesquisar" 
  				value="Pesquisar" 
  				class="btn" 
  				id="btnPesquisar" 
  				onclick="getDados();"/>  				

  			</div>

		</div>

		<hr>

		<h2 style="color:black">Resultados da pesquisa:</h2>
      <div id="Resultado"> </div>

    </div>

    <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">

      <div id="divPerfil" class="container-md">

        <?php

        try {

          $eName = '<div class="row mb-3">
            <label for="name" class="col-sm-3 col-form-label">Nome: </label>
            <div class="col-sm-8">
            <input type="text" class="form-control no-select" value="'.$nameCli.'" id="name" disabled>
            </div>
            </div>';

          $eCpf = '<div class="row mb-3">
            <label for="cpf" class="col-sm-3 col-form-label">CPF: </label>
            <div class="col-sm-8">
            <input type="text" class="form-control no-select" value="'.$cpfCli[0].$cpfCli[1].$cpfCli[2].'.'.$cpfCli[3].$cpfCli[4].$cpfCli[5].'.'.$cpfCli[6].$cpfCli[7].$cpfCli[8].'-'.$cpfCli[9].$cpfCli[10].'" id="cpf" disabled>
            </div>
            </div>';

          $eEmail = '<div class="row mb-3">
            <label for="email" class="col-sm-3 col-form-label">E-mail: </label>
            <div class="col-sm-8">
            <input type="email" class="form-control no-select" value="'.$emailCli.'" id="email" disabled>
            </div>
            </div>';

          $date = '<div class="row mb-3">
            <label for="dataNasc" class="col-sm-3 col-form-label">Nascimento: </label>
            <div class="col-sm-8">
            <input type="date" class="form-control no-select" value="'.$dnCli.'" id="dataNasc" disabled>
            </div>
            </div>';

          $eCity = '<div class="row mb-3">
            <label for="cidade" class="col-sm-3 col-form-label">Bairro: </label>
            <div class="col-sm-8">
            <input type="text" class="form-control no-select" value="'.$cityCli.'" id="cidade" disabled>
            </div>
            </div>';

          $eGe = '<div class="row mb-3">
            <label for="Generp" class="col-sm-3 col-form-label">Gênero: </label>
            <div class="col-sm-8">
            <input type="text" class="form-control no-select" value="'.$generoCli.'" id="ge" disabled>
            </div>
            </div>';

          $eSenha = '<div class="row mb-3">
            <label for="senha" class="col-sm-3 col-form-label">Senha: </label>
            <div class="col-sm-8">
            <input type="password" class="form-control no-select" value="'.$senhaCli.'" id="senha" disabled>
            </div>
            </div>';

          $enFone = '<div class="row mb-3">
            <label for="telefone" class="col-sm-3 col-form-label">Telefone: </label>
            <div class="col-sm-8">
            <input type="text" class="form-control no-select" value="'.$nFoneClie.'" id="telefone" disabled>
            </div>
            </div>';

          $eNumCasa = '<div class="row mb-3">
            <label for="numeroCasa" class="col-sm-3 col-form-label">Número residêncial: </label>
            <div class="col-sm-8">
            <input type="text" class="form-control no-select" value="'.$numCaCliente.'" id="numCasa" disabled>
            </div>
            </div>';


          $eloCliente = '<div class="row mb-3">
            <label for="numeroCasa" class="col-sm-3 col-form-label">Logradouro: </label>
            <div class="col-sm-8">
            <input type="text" class="form-control no-select" value="'.$logaCli.'" id="numCasa" disabled>
            </div>
            </div>';
        
        $stmt = null;   
        
        
        echo "$eName 
        $eCpf 
        $eEmail 
        $eGe 
        $date 
        $eCity 
        $eNumCasa
        $eloCliente
        $eSenha 
        $enFone";
          
        } catch (Exception $e) {
          
        }


         ?>


      </div>

    </div>

    <div class="tab-pane fade msg" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">

                        <!-- Começo do chat -->

        <div class="container-md">

           <iframe src="./chatCliente/index.php" width="100%" height="93vh"></iframe>

        </div>

        <!-- Fim do chat -->
          
    </div>

    <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">

      	<div class="container-md">

    	</div>
  
  	</div>
    
    </div>
  </div>
</div>
</div>
 
 </body>
 </html>

 <script 
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
 </script>

<script 
src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" 
crossorigin="anonymous">
</script>

<script type="text/javascript" 
src="Pesquisa.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script type="text/javascript">
	  function sair() {
    window.location.href="./dest.php";
  }
</script>