<?php

// Iniciando Session

session_start();

// Recebendo valores

$nome = $_POST['name'];
$CPF = $_POST['cpf'];
$nasc = $_POST['datanasc'];
$cidade = $_POST['cidade'];
$email = $_POST['email']; 
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];

// Adicionando em sessions

$_SESSION['username'] = $nome;
$_SESSION['cpf'] = $CPF;
$_SESSION['datanasc'] = $nasc;
$_SESSION['cidade'] = $cidade;
$_SESSION['email'] =  $email;
$_SESSION['telefone'] = $telefone;
$_SESSION['senha'] = $senha;

// Separando nome de sobrenome

$partes = explode(' ', $nome);
$primeiroNome = array_shift($partes);
$ultimoNome = array_pop($partes);


?>

<!DOCTYPE html>
    <head>
        <meta 
        charset="utf-8">
        <meta 
        name="viewport" 
        content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../css/bootstrap.min.css" >

        <link rel="stylesheet" type="text/css" href="../css/styleFormularioServico.css">

        <title> Home+ </title>

        <style>

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .newDiv{
      margin-top: 10px;
      margin-bottom: 10px;
    }

    p.text-end{
      font-size: 20pt;
    }

    p.text-end:hover{
      cursor: pointer;
      color: blue;
    }

    h3{
      text-align: center;
    color: #2AA3D3;
    text-shadow: 1px 1px 1px black;
    font-size: 30pt;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

    div.casca{
    border: 2px solid rgb(204, 154, 000);
    border-radius: 1em;
    box-shadow: 5px 5px 10px #F09A00;
    padding: 10px;
    }

    .a{
      margin-top: 2%;
      margin-bottom: 2%;
    }

    #validationServer{
      background-color: rgba(042, 163, 211, 60%);
      border: 2px solid rgb(204, 154, 000);
      font-family: initial;
      font-size: 14pt;

    }

    label{
      color: rgb(040, 041, 035);
      font-family: initial;
        font-size:14pt;
    }

    </style>

    </head>
    <body>

      <div class="a">

        <h3 id="h3">Cadastrar Serviço</h3> 

      </div>

      <div class="container">

        <form action="cadastrarPrestador.php" 
        method="POST" novalidate> 

          <div id="form" class="casca">

            <div class="row g-3">

              <div class="col-md-4">

                <label for="validationServer" class="form-label">
                  Nome
                </label>

                <input type="text" class="form-control is-valid" 
                id="validationServer" value="<?php echo($primeiroNome);?>" 
                required disabled>

              </div>

              <div class="col-md-4">

                <label for="validationServer" class="form-label">
                  Sobrenome
                </label>
              
                <input type="text" class="form-control is-valid"
                id="validationServer" value="<?php echo($ultimoNome);?>"
                required disabled>
              
              </div>

              <div class="col-md-4">

                <label for="validationServer" class="form-label">
                  Email
                </label>

                <input type="text" class="form-control is-valid" 
                id="validationServer" name="email"  value="<?php echo($email);?>" 
                required disabled>
              </div>

              <div class="col-md-4">

                <label for="validationServer" class="form-label">
                  CPF
                </label>
              
                <input type="text" class="form-control is-valid" 
                id="validationServer" name="cpf" value="<?php echo($CPF);?>" 
                required disabled>
              </div>

              <div class="col-md-4">
                
                <label for="validationServer" class="form-label">
                  Data de Nascimento
                </label>

              <input type="date" class="form-control is-valid" 
              id="validationServer" name="datanasc" value="<?php echo($nasc);?>" 
              required disabled>
        
              </div>

              <div class="col-md-4">

                <label for="validationServer" class="form-label">
                  Cidade
                </label>

                <input type="text" class="form-control is-valid" id="validationServer" 
                name="cidade" value="<?php echo($cidade);?>" required disabled>
              </div>

              <div class="col-md-4">

                <label for="validationServer" class="form-label">
                  Telefone
                </label>
          
                <input type="text" class="form-control is-valid" 
                id="validationServer" name="telefone"  
                value="<?php echo($telefone);?>" required disabled>
              
              </div>

              <div class="col-md-4">

                <label for="validationServer" class="form-label">
                  Senha
                </label>

                <input type="password" class="form-control is-valid" 
                id="validationServer" name="senha" value="<?php echo($senha);?>" 
                required disabled>

              </div>

              <div class="col-md-4">

                <label for="validationServer" class="form-label">
                  Username(Nome de Usuário)
                </label>

                <div class="input-group has-validation">

                  <span class="input-group-text" id="validationServer">
                    @
                  </span>
                  
                  <input type="text" class="form-control is-valid" 
                  id="validationServer" 
                  aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" name="nome" 
                  value="<?php echo($nome);?>" required disabled>

                </div>
              </div>

              <div id="nw">
                <div class="row">
                  <div class="col">
                    <input name="servico[]" type="text" class="form-control" placeholder="Serviço" required="true">
                  </div>
                  <div class="col">
                    <input type="text" name="valor[]" class="form-control" placeholder="Valor" required="true">
                  </div>
                </div>
              </div>

<div class="d-flex flex-row-reverse bd-highlight">

              <div class="d-inline-flex p-2 bd-highlight  end-0">
                <p 
                  class="text-end" 
                  id="add" 
                  onclick="adcElemento()">
                    + Adicionar Serviço
                </p>

              </div>
</div>

              

              <div class="col-12">

                <button class="btn btn-primary" type="submit">
                  Cadastrar
                </button>

              </div>
            </div>
          </div>
        </form>
      </div>

      <br>
      <br>



    <div class="position-relative bottom m-4">

      <div class="progress" style="height: 1px;">

        <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
          <button type="button" class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">1</button>
          <button type="button" class="position-absolute top-0 start-50 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">2</button>
          <button type="button" class="position-absolute top-0 start-100 translate-middle btn btn-sm btn-secondary rounded-pill" style="width: 2rem; height:2rem;">3</button>

      </div>

    </div>

    <script type="text/javascript" src="../js/create.js"></script>

    <script 
    src="../js/bootstrap.js"></script>

    <script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" 
    crossorigin="anonymous"></script>

    <script 
    src="//www.google-analytics.com/analytics.js"></script>
    
    <script 
    type="text/javascript" 
    src="//code.jquery.com/jquery-2.0.3.min.js"></script>

    <script 
    type="text/javascript" 
    src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>

    <script 
    type="text/javascript" 
    src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

    <script 
    src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-masker/1.1.0/vanilla-masker.min.js"></script>


    </body>
</html>