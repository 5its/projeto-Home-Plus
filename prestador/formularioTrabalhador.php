<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta 
        charset="UTF-8">
        <meta 
        name="viewport" 
        content="width=device-width, initial-scale=1">


        <title> Cadastro Prestador </title>

        <link 
        rel="shortcut icon" 
        href="..\imagens\favicon.ico">
        


        <script  
        src="//www.google-analytics.com/analytics.js"></script>

        <script 
        type="text/javascript" 
        src="//code.jquery.com/jquery-2.0.3.min.js"></script>

        <script 
        type="text/javascript" 
        src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>

<!-- Mascara telefone -->
<script 
src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-masker/1.1.0/vanilla-masker.min.js"></script>

<!-- Bootstrap -->
<link 
href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" 
rel="stylesheet" 
integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" 
crossorigin="anonymous">
<script 
type="text/javascript" 
src="./../js/bootstrap.js"></script>
<script 
src="../js/bootstrap.min.js"></script>

<!-- Style cadastro Prestador -->
<link 
rel="stylesheet" 
type="text/css" 
href="../css/styleCadastroTrabalhador2.css">

<!-- Adição da função exibir -->
<script 
type="text/javascript" 
src="../js/exibir.js"></script>

<!-- Inclusão do jQuery-->
<script 
src="http://code.jquery.com/jquery-1.11.1.js"></script>
<!-- Inclusão do Plugin jQuery Validation-->
<script 
src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>
<!-- Validador -->
<script 
src="../js/validar.js"></script>

<!-- Adição da mascara do CPF -->
<script 
type="text/javascript" 
src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>
<script 
type="text/javascript" 
src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>


    </head>
    <body>



<section>

    <div class="top"> 
        <img src="../imagens/Home+2.png" width="100" height="100" id="img1"> <br>

        <p id="font1"> Faça seu cadastro como prestador !</p> 
        <p id="font2"> Insira seus dados: </p>
    </div>


<form class="row g-3" id="form1" action="formularioDeServiços.php" name="register" method="post">
    

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

                <input type="city" id="cidade" name="cidade" class="form-control" placeholder="cidade:" aria-label="cidade:" required>
                <label for="floatingInput"> Digite sua cidade: </label>
                 
            </div>

           <div class="msg" style="margin-top: 0px; margin-bottom: 0px;"></div>

            <div class="form-floating mb-3">

                <input type="email" id="email" name="email" class="form-control" placeholder="email:" aria-label="email" required>
                <label for="floatingInput"> Digite seu email: </label>
                 
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
    <button class="btn btn-primary" type="submit">Cadastrar</button>
  </div>

        </form>

	

</section>


    <div class="position-relative m-4">

<div class="progress" style="height: 1px;">

  <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

</div>
<button type="button" class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">1</button>
<button type="button" class="position-absolute top-0 start-50 translate-middle btn btn-sm btn-secondary rounded-pill" style="width: 2rem; height:2rem;">2</button>
<button type="button" class="position-absolute top-0 start-100 translate-middle btn btn-sm btn-secondary rounded-pill" style="width: 2rem; height:2rem;">3</button>
</div>

    
        <script>
            function inputHandler(masks, max, event) {
	        var c = event.target;
	        var v = c.value.replace(/\D/g, '');
	        var m = c.value.length > max ? 1 : 0;
	        VMasker(c).unMask();
	        VMasker(c).maskPattern(masks[m]);
	        c.value = VMasker.toPattern(v, masks[m]);
            }

            var telMask = ['(99) 9999-99999', '(99) 99999-9999'];
            var tel = document.querySelector('input[attrname=telephone1]');
            VMasker(tel).maskPattern(telMask[0]);
            tel.addEventListener('input', inputHandler.bind(undefined, telMask, 14), false);

            var docMask = ['999.999.999-999', '99.999.999/9999-99'];
            var doc = document.querySelector('#doc');
            VMasker(doc).maskPattern(docMask[0]);
            doc.addEventListener('input', inputHandler.bind(undefined, docMask, 14), false);
        </script>



    </body>
</html>