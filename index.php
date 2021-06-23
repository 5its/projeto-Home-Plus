<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">

          <title> Home+ </title>
          
          <link rel="shortcut icon" href=".\imagens\favicon.ico">

          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

          <style>
           @import url('https://fonts.googleapis.com/css2?family=Blinker&display=swap');

            div.cont-card{
              margin-left: 5%;
              margin-right: 5%;
              margin-top: 5%;
              margin-bottom: 5%;
            }

            h4.card-title{
              text-align: center;
              margin-bottom: 5%;
              font-family: 'Blinker', sans-serif;
            }

            p.card-text{
              text-align: justify;

            }

            div.card{
              border: 0.5px rgb(240, 154, 000) solid;
              box-shadow: 10px 10px 20px 1px rgb(240, 154, 000);
              padding: 10px;
              margin-bottom: 5%;
            }

            div.card:hover{
              /* transform: scale(1.05,1.05); */
              zoom: 1;
              font-size: 14pt;
              cursor:inherit;
              padding: 0%;
              margin-bottom: 0%;
            }

            p.card-text{
              cursor: context-menu;
              -webkit-touch-callout: none;  /* iPhone OS, Safari */
              -webkit-user-select: none;    /* Chrome, Safari 3 */
              -khtml-user-select: none;     /* Safari 2 */
              -moz-user-select: none;       /* Firefox */
              -ms-user-select: none;        /* IE10+ */
              user-select: none;            /* Possível implementação no futuro */
              /* cursor: default; */
            }
            p.card-text{
              cursor: context-menu;
            }

            hr{
              margin-left: 5%;
              margin-right: 5%;
            }

            section.sobre h1#sobre{
              text-align: center;
              color: #2AA3D3;
              font-family: 'Blinker', sans-serif;
              font-size: 32pt;
              font-weight: 600;
              text-shadow: 1px 1px 1px black;

            }

            section.sobre{
              margin-right: 5%;
              margin-left: 5%;
            }

            div.col article p.sobre{
              text-align: justify;
              margin-left: 2%;
              font-size: 14pt;
              -webkit-touch-callout: none;  /* iPhone OS, Safari */
              -webkit-user-select: none;    /* Chrome, Safari 3 */
              -khtml-user-select: none;     /* Safari 2 */
              -moz-user-select: none;       /* Firefox */
              -ms-user-select: none;        /* IE10+ */
              user-select: none;            /* Possível implementação no futuro */
              /* cursor: default; */
            }

            div.col article{
              margin-top: 8%;
              cursor: zoom-in;

            }

            div.col article:active{
              zoom: 1.2;
              cursor: zoom-out;
            }

            div.col img.home{
              padding: 10% 10% 10% 10%;
              -webkit-touch-callout: none;  /* iPhone OS, Safari */
              -webkit-user-select: none;    /* Chrome, Safari 3 */
              -khtml-user-select: none;     /* Safari 2 */
              -moz-user-select: none;       /* Firefox */
              -ms-user-select: none;        /* IE10+ */
              user-select: none;            /* Possível implementação no futuro */
              /* cursor: default; */
            }



            @media screen and (max-width: 800px){
              div.img{
                margin-right: 50%;
              }

            }

            

          </style>

        
    </head>
    <body>

    <!-- Navbar -->

    <nav class="navbar navbar-expand-lg navbar-light" id="navbar" >
      <div class="container-fluid">
        <a class="navbar-brand" href="#"> <img src="./imagens/Home+3.png" width="60" height="50" alt="" style=" border:0.5px solid rgb(15, 145, 192); border-radius: 10px;"> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">  Início  </a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#sobre">  Sobre nós  </a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#cont">  Contato  </a>
          </li>




          <li class="nav-item dropdown collapse navbar-collapse">
            <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             Já tem uma conta?
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="./cliente/loginCliente.php">Entre como Cliente </a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="./prestador/loginTrabalhador.php">Entre como Prestador</a></li>
            </ul>
          </li>
    
            <li class="nav-item dropdown collapse navbar-collapse">
              <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Cadastre-se!
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="./cliente/formularioCliente.php">Cadastre-se como Cliente </a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="./prestador/formularioTrabalhador.php">Cadastre-se como Prestador</a></li>
              </ul>
            </li>
          </div>
      </div>
      </div>
    </nav>

    <!-- Fim navbar -->

    <!-- Carousel -->

      <div id="carouselHomeplus" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselHomeplus" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselHomeplus" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselHomeplus" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src=".\imagens\carouselSlide1.2.jpeg" class="d-block w-100" alt="..." height="500" width="300">
        </div>
        <div class="carousel-item">
          <img src=".\imagens\carouselSlide2.jpeg" class="d-block w-100" alt="..." height="500" width="300">
        </div>
        <div class="carousel-item">
          <img src=".\imagens\carouselSlide3.jpeg" class="d-block w-100" alt="..." height="500" width="300">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselHomeplus"  data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselHomeplus"  data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
      </div>


      <!-- Fim carousel -->

      <br>
      <br>
      <br>

      <!-- Sobre -->

      <section class="sobre">

        <h1 id="sobre">Um pouco sobre Home+</h1>
      
        <br>
      
        <div class="container">
          <div class="row">
            <div class="col">
              <img src="./imagens/Home+3.png" class="home" alt="">
            </div>
            <div class="col img">
              <article>
                <p class="sobre">
                  A Home+ tem como objetivo conectar diversos prestadores de serviços que estão a procura de realizar um contrato com pessoas que estão necessitando de serviços unicos.
                </p>
                <p class="sobre">
                  Em nossa plataforma a proposta é fazer com que o cliente consiga  contratar serviços de pequenos reparos de qualidade, eficiência e agilidade, ainda com um preço justo, aonde o prestador pode exercer sua função de forma segura e sem exploração.
                </p>
            </article>
            </div>
          </div>
      
      </section>

      <!-- fim sobre -->

      <!-- Cards -->

<div class="cont-card">
  <div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col">
      <div class="card h-100">
        <img src="./imagens/cardImg3-1.jpeg" class="card-img-top" alt="...">
        <div class="card-body">
          <h4 class="card-title"> Taxa de Cobrança Baixa! </h4>
          <p class="card-text"> Para você conseguir ter seu rendimento, nossa aplicação recolhe apenas 15% do valor do serviço cobrado, dando mais liberdade ao prestador de serviços. </p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100">
        <img src="./imagens/cardImg2-1.jpeg" class="card-img-top" alt="...">
        <div class="card-body">
          <h4 class="card-title"> Avaliação dos Usuários </h4>
          <p class="card-text"> Para você escolher os mais bem avaliados, nossa aplicação conta com um sistema de avaliação seguro para os clientes e para os prestadores de serviços. </p>
        </div>
        </div>
    </div>
    <div class="col">
      <div class="card h-100">
        <img src="./imagens/cardImg1-1.jpeg" class="card-img-top" alt="...">
        <div class="card-body">
          <h4 class="card-title">Serviços Qualificados</h4>
          <p class="card-text"> De ótima excelência, serviços domésticos de todos os tipos prezando pela qualidade e modernidade. </p>
        </div>
      </div>
    </div>
  </div>
</div>
      <!-- Fim cards -->

      <footer class="container py-5" id="cont" style="border-top: gray solid 1px;">
        <div class="row">
          <div class="col-12 col-md">
           <a href="./../5its/"> <img src="./imagens/5itsLogo.jpg" alt="5its" style="width: 110px"></a>
            <small class="d-block mb-3 text-muted">&copy; 2021 </small>
          </div>
          <div class="col-6 col-md">
            <h5> Propietários: </h5>
            <ul class="list-unstyled text-small">
              <li><a class="link-secondary"> Gabriel de Almeida </a></li>
              <li><a class="link-secondary" href="#"> Gabriel Alves Pereira </a></li>
              <li><a class="link-secondary" href="#"> Marcelo Lucas </a></li>
              <li><a class="link-secondary" href="#"> Nicolas Lira</a></li>
              <!-- <li><a class="link-secondary" href="#">Another one</a></li>
              <li><a class="link-secondary" href="#">Last time</a></li> -->
            </ul>
          </div>
          <div class="col-6 col-md">
            <h5> Redes Sociais: </h5>
            <ul class="list-unstyled text-small">
              <li>  
                <a class="link-secondary" href="https://www.instagram.com/homeplusby5its/">@Instagram</a>
              </li>
              <li>        
                <a class="link-secondary" href="https://twitter.com/homeplusby5its">@Twitter</a></li>
               <li><a class="link-secondary" href="mailto: contatoHomePlus@outlook.com"> contatoHomePlus@outlook.com </a></li>
            </ul>
          </div>
          <div class="col-6 col-md">
            <h5>Telefones:</h5>
            <ul class="list-unstyled text-small">
              <li>(11) 93406-6274</li>
              <li>(11) 98120-3716</li>
              <li>(11) 97779-4325</li>
              <li>(11) 97627-9128</li>
            </ul>
          </div>
          <div class="col-6 col-md">
            <h5> Termos de uso </h5>
            <ul class="list-unstyled text-small">
             
              <li><a class="link-secondary" href="Termos%20de%20uso%20Home+.php">Terms</a></li>
            </ul>
          </div>
        </div>
      </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    </body>
</html>