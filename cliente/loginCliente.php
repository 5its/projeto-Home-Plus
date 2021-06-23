<!DOCTYPE html>
<html lang="pt-br">

    <head>
    <meta charset="UTF-8">
    <title> Login de Cliente </title>

        <link rel="shortcut icon" href="..\imagens\favicon.ico">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="..\css\styleLoginCliente4.css">
    </head>

    <body>

    <form action="./verificarCliente.php" method="POST">
        <center>

        <img src="../imagens/Home+2.png" width="100" height="100" id="img1"> <br>

        <font id="font1"> Login como Cliente </font> <br>

        <label class="visually-hidden"> Digite seu email </label>
        <input type="email" id="email" class="form-control" name="email" placeholder="Digite seu Email" required autofocus>

        <label class="visually-hidden"> Digite sua senha </label>
        <input type="password" id="senha" class="form-control" name="senha" placeholder="Senha" required> <br>

        <button type="submit" id="button"> Entrar </button>

        </center>
    </form>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    </body>

</html>
