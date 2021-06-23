<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <title> Cadastro de Cliente </title>
        <link rel="shortcut icon" href="..\imagens\favicon.ico">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="..\css\styleFormularioCliente4.css">

        <style type="text/css">
          select#ge{
        margin: 10px 10px;
        border-color: rgb(204, 154, 000);
        font-family: initial;
}
        </style>


    </head>
    <body>


       <section>

    <div class="top"> 
        <img src="../imagens/Home+2.png" width="100" height="100" id="img1"> <br>

        <p id="font1"> Faça seu cadastro como cliente!</p> 
        <p id="font2"> Insira seus dados: </p>
    </div>


<form class="row g-3" id="form1" action="cadastrarCliente.php" name="register" method="post">
    

        <div class="form-floating mb-3">

            <input type="text" id="name" name="name" class="form-control" placeholder="Nome" aria-label="nome" required>
            <label for="nome"> Nome: </label>
    
        </div>

        <div class="msg" style="margin-top: 0px; margin-bottom: 0px;"></div>


   
            <div class="form-floating mb-3">

                <input type="text" name="cpf" id="cpf" class="form-control cpf-mask" placeholder="Ex.: 000.000.000-00" required>
                <label for="cpf"> CPF: </label>

            </div>

            <div class="msg" style="margin-top: 0px; margin-bottom: 0px;"></div>

            <div class="form-floating mb-3">

                <input type="date" id="datanasc" name="datanasc" class="form-control" placeholder="datanasc" aria-label="datanasc" required>
                <label for="floatingInput"> Data de Nascimento: </label>
                
            </div>

            <div class="msg" style="margin-top: 0px; margin-bottom: 0px;"></div>

            <div class="form-floating mb-3">

                <input type="text" id="logradouro" name="logradouro" class="form-control" placeholder="logradouro:" aria-label="Logradouro:" required>
                <label for="floatingInput"> Logradouro: </label>
                 
            </div>

           <div class="msg" style="margin-top: 0px; margin-bottom: 0px;"></div>

           <div class="form-floating mb-3">

                <input type="text" id="numR" name="numR" class="form-control" placeholder="Número residência:" aria-label="Número residência:" required>
                <label for="floatingInput"> Número residência: </label>
                 
            </div>

           <div class="msg" style="margin-top: 0px; margin-bottom: 0px;"></div>

           <br>

            <div class="row mb-3">

              <select class="form-select" id="ge" name="ge" required>

                <option selected disabled hidden> Gênero </option>

                <option value="M"> Masculino </option>

                <option value="F"> Feminino </option>

              </select>

            </div>

             <div class="msg" style="margin-top: 0px; margin-bottom: 0px;"></div>

            <div class="form-floating mb-3">

                <input type="email" id="email" name="email" class="form-control" placeholder="email:" aria-label="email" required>
                <label for="floatingInput"> Digite seu email: </label>
                 
            </div>
            
            <div class="msg" style="margin-top: 0px; margin-bottom: 0px;"></div>

            <div class="form-floating mb-3">

                <input type="text" id="baiC" name="bairoC" class="form-control" placeholder="Bairro:" aria-label="bairro:" required>
                <label for="floatingInput"> Digite seu bairro: </label>
                 
            </div>
            
            <div class="msg" style="margin-top: 0px; margin-bottom: 0px;"></div>

            <div class="form-floating mb-3">

                <input attrname="telephone1" name="telefone" id="telefone" type="text" class="form-control" placeholder="Telefone:" aria-label="Telefone" required>
                <label for="floatingInput"> Digite seu telefone: </label>
                 
            </div>
            
            <div class="msg" style="margin-top: 0px; margin-bottom: 0px;"></div>

            <div class="row g-2">
                <div class="col-md">
                    <div class="form-floating">
                        <input type="password" id="senha" name="senha" class="form-control" placeholder="senha:" aria-label="senha" required>
                        <label for="floatingInput"> Senha: </label>
                    </div>

                    <div class="msg" style="margin-top: 0px; margin-bottom: 0px;"></div>

                </div>

                <div class="col-md">
                    <div class="form-floating">
                        <input type="password" id="csenha" name="csenha" class="form-control" placeholder="csenha:" aria-label="senha" required>
                        <label for="floatingInput"> Confirmar senha: </label>
                    </div>

                    <div class="msg" style="margin-top: 0px; margin-bottom: 0px;"></div>

                </div>
            </div>
                
            <br>

            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="showPassword" onclick="exibir()">
                    <label class="form-check-label" for="invalidCheck2">Exibir senha</label>
                </div>
            </div>
            
            <br>

             <div class="col-12">
    <button class="btn btn-primary" type="submit" id="btncadastroC">Cadastrar</button>
  </div>

        </form>

    

</section>




    <div class="position-relative m-4">

  <div class="progress" style="height: 1px;">

    <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

  </div>

  <button type="button" class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">1</button>

  <button type="button" class="position-absolute top-0 start-50 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">2</button>

  <button type="button" class="position-absolute top-0 start-100 translate-middle btn btn-sm btn-secondary rounded-pill" style="width: 2rem; height:2rem;">3</button>

</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
      
    </script>

    <script async="" src="//www.google-analytics.com/analytics.js">
      
    </script>

  <script type="text/javascript" src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js">
    
  </script>

  <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js">
    
  </script>

    <!-- class="relative" 
    clas="relative-parent" -->

    <!-- Inclusão do jQuery-->
<script 
src="http://code.jquery.com/jquery-1.11.1.js"></script>
<!-- Inclusão do Plugin jQuery Validation-->
<script 
src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>
<!-- Validar -->
<script 
src="../js/validarC.js"></script>

<!-- Exibir senha -->

<script type="text/javascript" src=""></script>

    </body>
</html>